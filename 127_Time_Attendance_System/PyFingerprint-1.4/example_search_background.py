#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""
PyFingerprint
Copyright (C) 2015 Bastian Raschke <bastian.raschke@posteo.de>
All rights reserved.

@author: Bastian Raschke <bastian.raschke@posteo.de>
"""

import hashlib
import json
import time
from pyfingerprint.pyfingerprint import PyFingerprint

'''
||-------
|| Start
||===========================
|| Insert Data in database
||===========================
||
'''

def InsertInDB(fps_id):

    ThisPageDebug = True
    ErrorMessage  = ''
    errorCount    = 0

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
    except Exception as e:
        if ThisPageDebug:
            ErrorMessage += "INSERT INTO scan_history is not possible\n"+str(e)
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
            rules_id      = json.loads(staff['rules_id'])
        except Exception as e:
            errorCount += 1
            if ThisPageDebug:
                ErrorMessage += "SELECT * FROM staffs is not possible\n"+str(e)
                errorCount   += 1
    # End : select from staffs


    # Start : select from attendance_rules_staff
    if errorCount == 0:

        sql1 = "SELECT * FROM attendance_rules_staff WHERE id in"+str(tuple(rules_id))
        try:
            rows  = cursor.execute(sql1)
            rules = cursor.fetchall()
            if rows < 1:
                ErrorMessage += "attendance_rules_staff not rule(s) created\n"
                errorCount   += 1
        except Exception as e:
            errorCount += 1
            if ThisPageDebug:
                ErrorMessage += "SELECT * FROM attendance_rules_staff is not possible\n"+str(e)
                errorCount   += 1
    # End : select from attendance_rules_staff


    # Start : Select scan_history
    if errorCount == 0:

        sql = "SELECT * FROM scan_history WHERE scan_date = '%s' AND fps_id = '%d'" % (cdate, fps_id)
        try:
            cursor.execute(sql)
            scan_historys = cursor.fetchall()
        except Exception as e:
            errorCount += 1
            if ThisPageDebug:
                ErrorMessage += "SELECT * FROM scan_history is not possible\n"+str(e)
                errorCount   += 1
    # End : Select scan_history


    # Start : attendance execution
    if errorCount == 0:

        # entry_time_from  = rule['entry_time_from']
        # entry_time_to    = rule['entry_time_to']
        # out_time_from    = rule['out_time_from']
        # out_time_to      = rule['out_time_to']

        # late_duration        = rule['late_duration']
        # early_come_duration  = rule['early_come_duration']

        # early_leave_duration = rule['early_leave_duration']
        # late_leave_duration  = rule['late_leave_duration']

        # entry_time_from = datetime.datetime.strptime(scan_history['entry_time_from'], '%H:%M:%S').time()
        # entry_time_to   = datetime.datetime.strptime(scan_history['entry_time_to'], '%H:%M:%S').time()
        # out_time_from   = datetime.datetime.strptime(scan_history['out_time_from'], '%H:%M:%S').time()
        # out_time_to     = datetime.datetime.strptime(scan_history['out_time_to'], '%H:%M:%S').time()

        # Start : Check Every Role
        for rule in rules:

            days = json.loads(rule['days'])
            
            # Start ; Detect day number
            today_number = 0
            if rule['cycle'] == 'weekly':

                days_nummber = {
                            'Sunday' : 0,
                            'Monday' : 1,
                            'Tuesday' : 2,
                            'Wednesday' : 3,
                            'Thursday' : 4,
                            'Friday' : 5,
                            'Saturday' : 6
                            }

                today_name = datetime.now().strftime("%A")

                today_number = days_nummber[today_name]

            if rule['cycle'] == 'daily':
                pass # today_number = 0 - only first day (day[0]) will be consider rule

            # End : Detect day number

            count_as_early_come_from    = days[today_number]['count_as_early_come_from']
            normal_in_time_from         = days[today_number]['normal_in_time_from']
            on_duty_time                = days[today_number]['on_duty_time']
            normal_in_time_to           = days[today_number]['normal_in_time_to']
            late_count_untill           = days[today_number]['late_count_untill']

            count_as_early_leave_from   = days[today_number]['count_as_early_leave_from']
            normal_out_time_from        = days[today_number]['normal_out_time_from']
            off_duty_time               = days[today_number]['off_duty_time']
            normal_out_time_to          = days[today_number]['normal_out_time_to']
            late_leave_count_untill     = days[today_number]['late_leave_count_untill']



            # count_as_early_come_from   = time.strptime(count_as_early_come_from, '%H:%M')
            # normal_in_time_from        = time.strptime(normal_in_time_from, '%H:%M')
            # on_duty_time               = time.strptime(on_duty_time, '%H:%M')
            # normal_in_time_to          = time.strptime(normal_in_time_to, '%H:%M')
            # late_count_untill          = time.strptime(late_count_untill, '%H:%M')

            # count_as_early_leave_from   = time.strptime(count_as_early_leave_from, '%H:%M')
            # normal_out_time_from        = time.strptime(normal_out_time_from, '%H:%M')
            # off_duty_time               = time.strptime(off_duty_time, '%H:%M')
            # normal_out_time_to          = time.strptime(normal_out_time_to, '%H:%M')
            # late_leave_count_untill     = time.strptime(late_leave_count_untill, '%H:%M')

            count_as_early_come_from   = datetime.strptime(count_as_early_come_from, '%H:%M').time()
            normal_in_time_from        = datetime.strptime(normal_in_time_from, '%H:%M').time()
            on_duty_time               = datetime.strptime(on_duty_time, '%H:%M').time()
            normal_in_time_to          = datetime.strptime(normal_in_time_to, '%H:%M').time()
            late_count_untill          = datetime.strptime(late_count_untill, '%H:%M').time()

            count_as_early_leave_from   = datetime.strptime(count_as_early_leave_from, '%H:%M').time()
            normal_out_time_from        = datetime.strptime(normal_out_time_from, '%H:%M').time()
            off_duty_time               = datetime.strptime(off_duty_time, '%H:%M').time()
            normal_out_time_to          = datetime.strptime(normal_out_time_to, '%H:%M').time()
            late_leave_count_untill     = datetime.strptime(late_leave_count_untill, '%H:%M').time()

            # from pprint import pprint
            # pprint(count_as_early_come_from)
            # print(count_as_early_come_from)
            # print (count_as_early_come_from - normal_in_time_from).days * 24 * 60

            # Start : Check Entry and Out Time
            is_entry = False
            is_out   = False

            entry_status = 0 # 0 = no entry, 1 = intime, 2 = late,        3 = early come
            out_status   = 0 # 0 = no out,   1 = intime, 2 = early leave, 3 = late leave

            in_interval_time  = ''
            out_interval_time = ''

            entry_status_comment = 'Not Come' # Default
            out_status_comment   = 'Not Leave' # Default

            scan_history = scan_historys[len(scan_historys)-1]

            scan_date = scan_history['scan_date']
            scan_time = datetime.strptime(str(scan_history['scan_time']), '%H:%M:%S').time()
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

            if normal_in_time_from <= scan_time <= normal_in_time_to:
                # in time entry check
                is_entry             = True
                entry_status         = 1
                entry_status_comment = 'Enter In Time'
                entry_time           = scan_time

            elif normal_in_time_to <= scan_time <= late_count_untill:
                # Late entry check
                is_entry             = True
                entry_status         = 2
                entry_status_comment = 'Enter Lately'
                entry_time           = scan_time

            elif count_as_early_come_from <= scan_time <= normal_in_time_from:
                # early entry check
                is_entry             = True
                entry_status         = 3
                entry_status_comment = 'Enter Early (Early Came)'
                entry_time           = scan_time                



            # Start : Entry interval calculation
            if count_as_early_come_from <= scan_time <= late_count_untill:

                ScanTime   = datetime.strptime(str(scan_time), '%H:%M:%S')
                OnDutyTime = datetime.strptime(str(on_duty_time), '%H:%M:%S')
    
                if ScanTime < OnDutyTime:
                    in_interval_time = OnDutyTime - ScanTime
    
                elif OnDutyTime < ScanTime:
                    in_interval_time = '-'+str(ScanTime - OnDutyTime)
    
                elif OnDutyTime == ScanTime:
                    in_interval_time = '00:00:00'

            # End : Entry interval calculation



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

            if normal_out_time_from <= scan_time <= normal_out_time_to:
                # check in time out
                is_out             = True
                out_status         = 1
                out_status_comment = 'Leave In Time'
                out_time           = scan_time

            elif count_as_early_leave_from <= scan_time <= normal_out_time_from:
                # check early leave
                is_out             = True
                out_status         = 2
                out_status_comment = 'Leave Early'
                out_time           = scan_time

            elif normal_out_time_to <= scan_time <=  late_leave_count_untill:
                # check late leave
                is_out             = True
                out_status         = 3
                out_status_comment = 'Leave lately (Extra Time)'
                out_time           = scan_time



            # Start : Out interval calculation
            if count_as_early_leave_from <= scan_time <= late_leave_count_untill:
                
                ScanTime    = datetime.strptime(str(scan_time), '%H:%M:%S')
                OffDutyTime = datetime.strptime(str(off_duty_time), '%H:%M:%S')

                if ScanTime < OffDutyTime:
                    out_interval_time = '-'+str(OffDutyTime - ScanTime)
    
                elif OffDutyTime < ScanTime:
                    out_interval_time = ScanTime - OffDutyTime
    
                elif OffDutyTime == ScanTime:
                    out_interval_time = '00:00:00'

            # End : Out interval calculation



            '''
            ||-----
            || End
            ||===========================
            || Out check
            ||===========================
            ||
            '''
            # End : Check Entry and Out Time
    

            # Start : Check today already enrolled
            if errorCount == 0:

                sql1 = "SELECT * FROM attendance_staffs WHERE date ='%s' AND rule_id = '%d' AND staff_id = '%d'" % (cdate, rule['id'], staff['id'])
                try:
                    rows = cursor.execute(sql1)
                    attendance_staff = cursor.fetchone()

                    if rows < 1:
                        attendance_Exist = False
                    else:
                        attendance_Exist = True

                except Exception as e:
                    errorCount += 1
                    if ThisPageDebug:
                        ErrorMessage += "SELECT * FROM attendance_staffs is not possible - 2 \n "+str(e)
                        errorCount   += 1
            # End : Check today already enrolled


            # Start : Debug
            # if errorCount == 0:

            #     print(str(is_entry))
            #     print(str(is_out))
            #     print(entry_status_comment)
            #     print(out_status_comment)
            #     print('in_interval_time'+str(in_interval_time))
            #     print('out_interval_time'+str(out_interval_time))
            # End : Debug


            # Start : insert attendance
            if errorCount == 0:

                if is_entry and not attendance_Exist: # insert attendance for first entry
                    sql = "INSERT INTO attendance_staffs(staff_id, rule_id, date, entry_time, attened, entry_status, entry_status_comment, entry_delay_or_advanced_duration, status, created_at) VALUES ('%d', '%d', '%s', '%s', '%d', '%d', '%s','%s', '%d', '%s')" % (staff['id'], rule['id'], cdate, entry_time, 0, entry_status, entry_status_comment, in_interval_time, 1, datetime.now())
                    try:
                        cursor.execute(sql)
                        db.commit()
                    except Exception as e:
                        errorCount += 1
                        if ThisPageDebug:
                            ErrorMessage += "INSERT INTO attendance_staffs insert is not possible (Entry Function)\n"+str(e)
                            errorCount   += 1
                        db.rollback()

                if is_out: # update attendance when out

                    if attendance_Exist:

                        if attendance_staff['entry_status']:
                            attened = 1
                            work_duration = datetime.strptime(str(out_time), '%H:%M:%S') - datetime.strptime(str(attendance_staff['entry_time']), '%H:%M:%S')
                            
                        else:
                            attened = 0

                        sql = "UPDATE attendance_staffs SET out_time= '%s', attened= '%d', out_status= '%d', out_status_comment= '%s', out_delay_or_advanced_duration= '%s', work_duration= '%s', status= '%d', updated_at= '%s' WHERE id = '%d'" % (out_time, attened, out_status, out_status_comment, out_interval_time, work_duration, 1, datetime.now(), attendance_staff['id'])
                    
                    else:
                        attened = 0
                        sql = "INSERT INTO attendance_staffs(staff_id, rule_id, date, out_time, attened, out_status, out_status_comment, out_delay_or_advanced_duration, status, created_at) VALUES ('%d', '%d', '%s', '%s', '%d', '%d', '%s','%s', '%d', '%s')" % (staff['id'], rule['id'], cdate, out_time, 0, out_status, out_status_comment, out_interval_time, 1, datetime.now())

                    try:
                        cursor.execute(sql)
                        db.commit()
                    except Exception as e:
                        errorCount += 1
                        if ThisPageDebug:
                            ErrorMessage += "INSERT INTO attendance_staffs update is not possible (leave function) - 3\n"+str(e)
                            errorCount   += 1
                        db.rollback()
            # End : insert attendance

        # End : Check Every Role

    # disconnect from server
    db.close()
    print(ErrorMessage)


'''
||------
|| End
||===========================
|| Insert Data in database
||===========================
||
'''


'''
||-------
|| Start
||===========================
|| Success LED Indicator
||===========================
||
'''
import RPi.GPIO as GPIO
import time
def ledblink():

    LedPin = 11    # pin11

    GPIO.setmode(GPIO.BOARD)       # Numbers GPIOs by physical location
    GPIO.setup(LedPin, GPIO.OUT)   # Set LedPin's mode is output

    GPIO.output(LedPin, GPIO.LOW)  # led on
    time.sleep(0.2)
    GPIO.output(LedPin, GPIO.HIGH) # led off
    time.sleep(0.1)
    GPIO.output(LedPin, GPIO.LOW)  # led on
    time.sleep(0.1)
    GPIO.output(LedPin, GPIO.HIGH) # led off

    GPIO.output(LedPin, GPIO.HIGH)   # led off
    GPIO.cleanup()                  # Release resource

'''
||------
|| End
||===========================
|| Success LED Indicator
||===========================
||
'''

connected = False
f = ''
def ConnectWithDevice():
    try:
        global connected, f
        f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)

        if ( f.verifyPassword() == False ):
            raise ValueError('The given fingerprint sensor password is wrong!')
        connected = True

    except Exception as e:
        print('The fingerprint sensor could not be initialized!')
        print('Exception message: ' + str(e))
        connected =  False
## Search for a finger
##

## Tries to initialize the sensor
while not connected:
    ConnectWithDevice()


'''
|-------
| Start
|-------
| Status Control
|====================
|
'''
import json
status_file        = "/var/www/html/127_Time_Attendance_System/PyFingerprint-1.4/status.json"
status_change_file = "/var/www/html/127_Time_Attendance_System/PyFingerprint-1.4/status_change.json"

def status_set(str2):

    json_data = {"status":str2}
    with open(status_file, 'w') as outfile:
        json.dump(json_data, outfile)

def status_get():

    json_data = json.loads(open(status_change_file).read())
    return json_data["status_change"]

'''
|-------
| End
|-------
| Status Control
|====================
|
'''


## Gets some sensor information

print('Currently stored templates: ' + str(f.getTemplateCount()))

## Tries to search the finger and calculate hash
while True:

    if status_get() == "running":

        try:
            print('Waiting for finger...')

            ## Wait that finger is read
            if status_get() == "running" and f.readImage() == True:

                ## Converts read image to characteristics and stores it in charbuffer 1
                f.convertImage(0x01)

                ## Searchs template
                result = f.searchTemplate()

                positionNumber = result[0]
                accuracyScore = result[1]

                if ( positionNumber == -1 ):
                    print('No match found!')
                else:
                    ledblink()
                    InsertInDB(positionNumber)
                    print('Found template at position #' + str(positionNumber))
                    print('The accuracy score is: ' + str(accuracyScore))
                    time.sleep(4)
                ## OPTIONAL stuff
                ##

                ## Loads the found template to charbuffer 1
                # f.loadTemplate(positionNumber, 0x01)

                ## Downloads the characteristics of template loaded in charbuffer 1
                # characterics = str(f.downloadCharacteristics(0x01))

                ## Hashes characteristics of template
                # print('SHA-2 hash of template: ' + hashlib.sha256(characterics).hexdigest())

        except Exception as e:
            print('Operation failed!')
            print('Exception message: ' + str(e) + '\n')
            print('Trying to connect with device')
            f.__del__()
            ConnectWithDevice()
    
        status_set("running")
        time.sleep(0.6)
    else:
        pcl = f.__del__()
        status_set("stop")


