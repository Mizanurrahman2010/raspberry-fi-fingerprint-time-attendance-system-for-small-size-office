# import os
# os.system('sudo service fps start')

'''
|-------
| Start
|-------
| Status Control
|====================
|
'''

import json, time
status_file        = "/var/www/html/127_Time_Attendance_System/PyFingerprint-1.4/status.json"
status_change_file = "/var/www/html/127_Time_Attendance_System/PyFingerprint-1.4/status_change.json"

def status_change(str1):
    # str = running, stop

    json_data = json.loads(open(status_change_file).read())
    json_data["status_change"] = str1
    with open(status_change_file, 'w') as outfile:
        json.dump(json_data, outfile)

def status_get():

    json_data = json.loads(open(status_file).read())
    return json_data["status"]

status_change("running")

'''
|-------
| End
|-------
| Status Control
|====================
|
'''