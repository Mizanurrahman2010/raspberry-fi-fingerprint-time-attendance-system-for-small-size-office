#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""
PyFingerprint
Copyright (C) 2015 Bastian Raschke <bastian.raschke@posteo.de>
All rights reserved.

@author: Bastian Raschke <bastian.raschke@posteo.de>
"""

import time
from pyfingerprint.pyfingerprint import PyFingerprint

message = ''
ErrorCount = 0
fpsid = 0
f =''
## Enrolls new finger
##

## Tries to initialize the sensor
try:
    f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)

    if ( f.verifyPassword() == False ):
        raise ValueError('The given fingerprint sensor password is wrong!')
        ErrorCount += 1
        message += 'The given fingerprint sensor password is wrong!'

except Exception as e:
    ErrorCount += 1
    message += 'The fingerprint sensor could not be initialized!\n'
    message += 'The fingerprint sensor could not be initialized!\n'
    message += 'Exception message: ' + str(e)

## Gets some sensor information
# print('Currently stored templates: ' + str(f.getTemplateCount()))

## Tries to enroll new finger
try:
    # print('Waiting for finger...')

    ## Wait that first finger is read

    '''
    |===================
    | First Finger Read
    |===================
    '''
    count = 0
    MaxLoop = 50
    while count < MaxLoop:

        if f.readImage() == False:
            count += 1
        else:
            count += MaxLoop

    if count == MaxLoop:
        ErrorCount += 1
        message += 'You did not press your first finger'

    '''
    |===================
    | Existance check
    |===================
    '''
    if ErrorCount == 0:
        ## Converts read image to characteristics and stores it in charbuffer 1
        f.convertImage(0x01)

        ## Checks if finger is already enrolled
        result = f.searchTemplate()
        positionNumber = result[0]

        if ( positionNumber >= 0 ):
            ErrorCount += 1
            message += 'Template already exists at position #' + str(positionNumber)
    '''
    |===================
    | Second Finger Print check
    |===================
    '''
    if ErrorCount == 0:
        # print('Remove finger...')
        time.sleep(2)

        # print('Waiting for same finger again...')

        ## Wait that finger is read again
        count = 0
        while count < MaxLoop:

            if f.readImage() == False:
                count += 1
            else:
                count += MaxLoop

        if count == MaxLoop:
            ErrorCount += 1
            message += 'You did not press your first finger'
        '''
        |===================
        | Store Template
        |===================
        '''
        if ErrorCount == 0:
            ## Converts read image to characteristics and stores it in charbuffer 2
            f.convertImage(0x02)

            ## Compares the charbuffers and creates a template
            f.createTemplate()

            ## Gets new position number (the counting starts at 0, so we do not need to increment)
            positionNumber = f.getTemplateCount()

            ## Saves template at new position number
            if ( f.storeTemplate(positionNumber) == True ):
                fpsid = positionNumber
        '''
        |===================
        | Store Template
        |===================
        '''
except Exception as e:
    ErrorCount += 1
    message += 'Operation failed!\n'
    message += 'Exception message: ' + str(e)


if ErrorCount == 0:
    print(fpsid)
else:
    print(message)