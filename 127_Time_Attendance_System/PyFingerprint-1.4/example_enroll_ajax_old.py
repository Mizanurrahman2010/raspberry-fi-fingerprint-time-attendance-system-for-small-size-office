#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""
PyFingerprint
Copyright (C) 2015 Bastian Raschke <bastian.raschke@posteo.de>
All rights reserved.

@author: Bastian Raschke <bastian.raschke@posteo.de>
"""

# Start : Stop already running finger print scanning service

# import os
# os.system('sudo systemctl stop fps')


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

status_change("stop")
time.sleep(0.5)

'''
|-------
| End
|-------
| Status Control
|====================
|
'''
import time
from pyfingerprint.pyfingerprint import PyFingerprint


## Enrolls new finger
##

message    = ''
ErrorCount = 0
fpsid      = 0

## Tries to initialize the sensor
try:
    f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)

    if ( f.verifyPassword() == False ):
        raise ValueError('The given fingerprint sensor password is wrong!\n')
        ErrorCount += 1
        message    += 'The given fingerprint sensor password is wrong!\n'

except Exception as e:
    ErrorCount += 1
    message    += 'The fingerprint sensor could not be initialized!\n'
    message    += 'Exception message: ' + str(e)+'\n'

## Gets some sensor information
#  -- print('Currently stored templates: ' + str(f.getTemplateCount()))

## Tries to enroll new finger
try:
    # -- print('Waiting for finger...')

    ## Wait that finger is read
    while ( f.readImage() == False ):
        pass

    ## Converts read image to characteristics and stores it in charbuffer 1
    f.convertImage(0x01)

    ## Checks if finger is already enrolled
    result = f.searchTemplate()
    positionNumber = result[0]

    if ( positionNumber >= 0 ):
        ErrorCount += 1
        message    += 'Template already exists at position #' + str(positionNumber) +'\n'

    # -- print('Remove finger...')
    time.sleep(2)

    # -- print('Waiting for same finger again...')

    ## Wait that finger is read again
    while ( f.readImage() == False ):
        pass

    ## Converts read image to characteristics and stores it in charbuffer 2
    f.convertImage(0x02)

    ## Compares the charbuffers and creates a template
    f.createTemplate()

    ## Gets new position number (the counting starts at 0, so we do not need to increment)
    positionNumber = f.getTemplateCount()

    ## Saves template at new position number
    if ( f.storeTemplate(positionNumber) == True ):
        # -- print('Finger enrolled successfully!')
        # -- print('New template position #' + str(positionNumber))
        fpsid = positionNumber

except Exception as e:
    ErrorCount += 1
    message    += 'Operation failed!\n'
    message    += 'Exception message: ' + str(e) +'\n'



# Start : Re-run already stopped finger print scanning service

status_change("running")

if ErrorCount == 0:
    print(fpsid)
else:
    print(message)

# os.system('sudo service fps start')

# End : Re-run already stopped  finger print scanning service
