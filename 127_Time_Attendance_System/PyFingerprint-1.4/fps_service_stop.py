#!/usr/bin/python

# import os
# os.system('sudo service fps stop')

'''
|-------
| Start
|-------
| Status Control
|====================
|
'''

import json
import time
status_file = '/var/www/html/127_Time_Attendance_System/PyFingerprint-1.4/status.json'
status_change_file = '/var/www/html/127_Time_Attendance_System/PyFingerprint-1.4/status_change.json'

def status_change(str1):
    global status_file, status_change_file
    try:
        json_data = json.loads(open(status_change_file).read())
        json_data["status_change"] = str1
        with open(status_change_file, 'w') as outfile:
            json.dump(json_data, outfile)

    except Exception as e:
        print(e)

def status_get():
    global status_file, status_change_file
    json_data = json.loads(open(status_file).read())
    return json_data["status"]

status_change("stop")

'''
|-------
| End
|-------
| Status Control
|====================
|
'''


# ticks = time.time()
# print "Number of ticks since 12:00am, January 1, 1970:", ticks