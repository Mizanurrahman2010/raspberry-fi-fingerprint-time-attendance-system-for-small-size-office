'''
Created on 08/04/2014

@author: jeanmachuca
'''
execfile('configuration.py')

fps = FPS.FPS_GT511C3(device_name=FPS.DEVICE_NAME, baud=9600, timeout=2, is_com=True)
fps.Open()
fps.UseSerialDebug = False
ThisPageDebug = True

# print('Press finger to Login')

while True:

    ErrorMessage = ''
    errorCount   = 0
    # Start : read file
    import json
    json_data = json.loads(open('config.json').read())
    if ThisPageDebug:
        ErrorMessage += json_data["status_change"]+'\n'

    if json_data["status_change"] == 'running':
    # End : read file

        fps.SetLED(True)
        if fps.IsPressFinger():
            # start : identify
            # fps.SetLED(True)

            if fps.CaptureFinger(True):
                fps.SetLED(False)
                fps_id = fps.Identify1_N()
                # fps.Close()

                if fps_id >= 0 and fps_id < 200:
                    if ThisPageDebug:
                        ErrorMessage += "FPS ID is "+str(fps_id)+'\n'
                        
                    # Start : database
                    import MySQLdb

                    # Open database connection
                    db = MySQLdb.connect("localhost", "root", "", "127_time_attendance_system")

                    # prepare a cursor object using cursor() method
                    cursor = db.cursor(MySQLdb.cursors.DictCursor)

                    from datetime import datetime
                    ctime = datetime.now().strftime("%H:%M:%S")
                    cdate = datetime.now().strftime("%Y-%m-%d")


                    # Start : Insert into Scan History
                    sql = "INSERT INTO scan_history(fps_id, scan_time, scan_date) VALUES ('%d', '%s' ,'%s')" % (fps_id, ctime, cdate)
                    try:
                        # Execute the SQL command
                        cursor.execute(sql)
                        # Commit your changes in the database
                        db.commit()
                    except:
                        if ThisPageDebug:
                            ErrorMessage += "INSERT INTO scan_history is not possible\n"
                            errorCount   += 1
                        # Rollback in case there is any error
                        db.rollback()
                    # End : Insert into Scan History


                    # Start : select from staffs
                    if errorCount == 0:

                        sql = "SELECT * FROM staffs WHERE fps_id = '%d'" % (fps_id)
                        try:
                            cursor.execute(sql)
                            staff         = cursor.fetchone()
                            department_id = staff['department_id']
                        except:
                            errorCount += 1
                            if ThisPageDebug:
                                ErrorMessage += "SELECT * FROM staffs is not possible\n"
                                errorCount   += 1
                    # End : select from staffs


                    # Start : select from attendance_rules_staff_department
                    if errorCount == 0:

                        sql1 = "SELECT * FROM attendance_rules_staff WHERE department_id = '%d'" % (department_id)
                        try:
                            rows = cursor.execute(sql1)
                            rule = cursor.fetchone()
                            if rows < 1:
                                ErrorMessage += "attendance_rules_staff not rule created\n"
                                errorCount   += 1
                        except:
                            errorCount += 1
                            if ThisPageDebug:
                                ErrorMessage += "SELECT * FROM attendance_rules_staff is not possible\n"
                                errorCount   += 1
                    # End : select from attendance_rules_staff_department


                    # Start : Select scan_history
                    if errorCount == 0:

                        sql = "SELECT * FROM scan_history WHERE scan_date = '%s' AND fps_id = '%d'" % (cdate, fps_id)
                        try:
                            cursor.execute(sql)
                            scan_historys = cursor.fetchall()
                        except:
                            errorCount += 1
                            if ThisPageDebug:
                                ErrorMessage += "SELECT * FROM scan_history is not possible\n"
                                errorCount   += 1
                    # End : Select scan_history


                    # Start : Check Entry and Out Time
                    if errorCount == 0:

                        entry_time_from  = rule['entry_time_from']
                        entry_time_to    = rule['entry_time_to']
                        out_time_from    = rule['out_time_from']
                        out_time_to      = rule['out_time_to']

                        late_duration        = rule['late_duration']
                        early_come_duration  = rule['early_come_duration']

                        early_leave_duration = rule['early_leave_duration']
                        late_leave_duration  = rule['late_leave_duration']

                        # entry_time_from = datetime.datetime.strptime(scan_history['entry_time_from'], '%H:%M:%S').time()
                        # entry_time_to   = datetime.datetime.strptime(scan_history['entry_time_to'], '%H:%M:%S').time()
                        # out_time_from   = datetime.datetime.strptime(scan_history['out_time_from'], '%H:%M:%S').time()
                        # out_time_to     = datetime.datetime.strptime(scan_history['out_time_to'], '%H:%M:%S').time()

                        is_entry = False
                        is_out   = False

                        entry_status = 1 # 0 = intime, 1 = late, 2 = early come
                        out_status   = 1 # 0 = intime, 1 = early leave, 2 = late leave

                        for scan_history in scan_historys:

                            scan_date = scan_history['scan_date']
                            scan_time = scan_history['scan_time']
                            # scan_date = datetime.datetime.strptime(scan_history['scan_date'], '%Y:%m:%d').date()
                            # scan_time = datetime.datetime.strptime(scan_history['scan_time'], '%H:%M:%S').time()

                            '''
                            |-------
                            | Start 
                            |===========================
                            | Entry check
                            |===========================
                            |
                            '''
                            # in time entry check
                            entry_late_time  = entry_time_to + late_duration
                            entry_early_time = entry_time_from - early_come_duration

                            if entry_time_from <= scan_time <= entry_time_to:
                                is_entry     = True
                                entry_status = 0
                                entry_time   = scan_time

                            # Late entry check
                            elif entry_time_to <= scan_time <= entry_late_time:
                                is_entry     = True
                                entry_status = 1
                                entry_time   = scan_time

                            # early entry check
                            elif entry_early_time <= scan_time <= entry_time_from:
                                is_entry     = True
                                entry_status = 2
                                entry_time   = scan_time
                            '''
                            ||------
                            || End  |
                            ||===========================
                            || Entry check
                            ||===========================
                            ||
                            '''

                            '''
                            |-------
                            | Start |
                            |===========================
                            | Out check
                            |===========================
                            |
                            '''
                            # check in time out
                            out_early_leave_time = out_time_from - early_leave_duration
                            out_late_leave_time  = out_time_to + late_leave_duration

                            if out_time_from <= scan_time <= out_time_to:
                                is_out     = True
                                out_status = 0
                                out_time   = scan_time

                            # check early leave
                            elif out_early_leave_time <= scan_time <= out_time_from:
                                is_out     = True
                                out_status = 1
                                out_time   = scan_time

                            # check late leave
                            elif out_time_to <= scan_time <=  out_late_leave_time:
                                is_out     = True
                                out_status = 2
                                out_time   = scan_time

                            '''
                            ||-----
                            || End
                            ||===========================
                            || Out check
                            ||===========================
                            ||
                            '''
                    # End : Check Entry and Out Time




                    # Start : insert attendance
                    if errorCount == 0:

                        if is_entry and is_out:

                            sql = "INSERT INTO attendance_staffs(staff_id, rule_id, date, entry_time, out_time, attened, entry_status, entry_status_comment, out_status, out_status_comment, status, created_at) VALUES ('%d', '%d', '%s', '%s' ,'%s', '%d', '%d', '%s', '%d', '%s', '%d', '%s')" % (staff['id'], rule['id'], cdate, entry_time, out_time, 1, entry_status, 'In in exact time', out_status, 'Out in exact time', 1, datetime.now())
                            try:
                                cursor.execute(sql)
                                db.commit()
                            except:
                                errorCount += 1
                                if ThisPageDebug:
                                    ErrorMessage += "INSERT INTO attendance_staffs is not possible\n"
                                    errorCount   += 1
                                db.rollback()
                    # End : insert attendance

                    # disconnect from server
                    db.close()
                    # End : database

                elif fps_id == 200:
                    if ThisPageDebug:
                        ErrorMessage += "Failed to find the finger print in database\n"
                        errorCount   += 1
                    # not found id
            else:
                if ThisPageDebug:
                    ErrorMessage += "Failed to capture your finger print\n"
                    errorCount   += 1
            # end : identify

        fps.SetLED(False)
        # FPS.delay(1)

        change_status = 'running'

    else:
        change_status = 'stop'

    json_data = json.loads(open('config.json').read())
    json_data["status"] = change_status
    with open('config.json', 'w') as outfile:
        json.dump(json_data, outfile)

    if ThisPageDebug:
        print ErrorMessage
    # FPS.delay(1)



