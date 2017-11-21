'''
Created on 08/04/2014

@author: jeanmachuca

SAMPLE CODE:

This script is a test for device connected to GPIO port in raspberry pi

For test purpose:

Step 1:
Connect the TX pin of the fingerprint GT511C3 to RX in the GPIO

Step 2:
Connect the RX pin of the fingerprint GT511C3 to TX in the GPIO

Step 3:
Connect the VCC pin of the fingerprint GTC511C3 to VCC 3,3 in GPIO

Step 4:
Connect the Ground pin of fingerprint GT511C3 to ground pin in GPIO


This may be works fine, if don't, try to change the fingerprint baud rate with baud_to_115200.py sample code


This script Enrolls your finger in the device internal database
you have 200 ids avalilables for enroll
Each time you executes this enroll script, enrollid is autoincrement for a free number

'''
import FPS, sys
DEVICE_GPIO     = '/dev/ttyAMA0'
DEVICE_LINUX    = '/dev/ttyUSB0'
DEVICE_MAC      = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS  = 'COM6'

FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_WINDOWS

FPS_Directory = '/var/www/html/127_Time_Attendance_System/GT511C3/'
#FPS_Directory = 'D:/xampp/htdocs/127_Time_Attendance_System/GT511C3/'

# Start : platform check

from sys import platform

if platform == "linux" or platform == "linux2":

    FPS.DEVICE_NAME = DEVICE_LINUX
    FPS_Directory = '/var/www/html/127_Time_Attendance_System/GT511C3/'

elif platform == "darwin":
    FPS.DEVICE_NAME = DEVICE_LINUX
    FPS_Directory = '/var/www/html/127_Time_Attendance_System/GT511C3/'

elif platform == "win32":

    FPS.DEVICE_NAME = DEVICE_WINDOWS
    FPS_Directory = 'D:/xampp/htdocs/127_Time_Attendance_System/GT511C3/'

# End : platform check

# Start : Extra function
def deleteContent(pfile):
    pfile.seek(0)
    pfile.truncate()

ErrorCount = 0
ErrorMsg = ''


# start : initial empty ServerTransmitter

try:
    ServerTransmitter = open(FPS_Directory+"ServerTransmitter.json", "w")
    deleteContent(ServerTransmitter)
    ServerTransmitter.close()
except OSError as err:
    ErrorCount += 1
    print('Not possible to open ServerTransmitter file - OS error:{0}'.format(err))
except ValueError:
    ErrorCount += 1
    print('Could not convert data to an integer')
except:
    ErrorCount += 1
    print("Not possible to open ServerTransmitter file - Unexpected error:", sys.exc_info()[0])

# end : initial empty ServerTransmitter

def WriteServerTransmitter(data):
    # ServerTransmitter = open("/var/www/html/GT511C3/ServerTransmitter.json", "w")
    # deleteContent(ServerTransmitter)
    # ServerTransmitter.close()

    # fo = open("/var/www/html/GT511C3/ServerTransmitter.json", "w")
    with open(FPS_Directory+"ServerTransmitter.json", "a+") as myfile:
        myfile.write(data)
        myfile.write("\n")
        myfile.close()

    # print(data)

def LastEnrolledID(data):
    LastEnrolledIDC = open(FPS_Directory+"LastEnrolledID.json", "w")
    deleteContent(LastEnrolledIDC)
    LastEnrolledIDC.close()

    fo = open(FPS_Directory+"LastEnrolledID.json", "w")
    fo.write(data)
    fo.close()
# end : Extra function

def LegacyEnroll(fps):
    '''
    Enroll test
    '''
    WriteServerTransmitter('Device Ready')
    enrollid=0
    okid=False
    #search for a free enrollid, you have max 200
    while not okid and enrollid < 200:
        IDExist = fps.CheckEnrolled(enrollid)
        if IDExist:
            enrollid+=1
        else:
            okid = True
    if enrollid <200:
        #press finger to Enroll enrollid
        WriteServerTransmitter('Press finger to Enroll %s' % str(enrollid))
        fps.EnrollStart(enrollid)
        fps.SetLED(True)
        while not fps.IsPressFinger():
            FPS.delay(1)
        iret = 0

        if fps.CaptureFinger(True):
            fps.SetLED(False)
            fps.Enroll1()
            #remove finger
            WriteServerTransmitter('Remove finger (1st)')
            while fps.IsPressFinger():
                FPS.delay(1)

            #Press same finger again
            fps.SetLED(True)
            WriteServerTransmitter('Press same finger again')

            while not fps.IsPressFinger():
                FPS.delay(1)
            if fps.CaptureFinger(True):
                fps.SetLED(False)
                fps.Enroll2()

                #remove finger
                WriteServerTransmitter('Remove finger (2nd)')
                while fps.IsPressFinger():
                    FPS.delay(1)
                #Press same finger again
                fps.SetLED(True)
                WriteServerTransmitter('Press same finger yet again')
                while not fps.IsPressFinger():
                    FPS.delay(1)
                if fps.CaptureFinger(True):
                    fps.SetLED(False)
                    iret = fps.Enroll3()
                    if iret == 0:
                        # LastEnrolledID(enrollid)
                        print(enrollid)
                        WriteServerTransmitter('Successfully Enrolled with enrolled id %s' % str(enrollid))
                    else:
                        if iret == 1:
                            ErrorFPS = 'Enroll Failed'
                        elif iret == 2:
                            ErrorFPS = 'Bad Finger'
                        elif iret == 3:
                            ErrorFPS = 'Finger print already taken'
                        else:
                            ErrorFPS = 'Error Unknown - ErrorFPS-5'

                        WriteServerTransmitter('ErrorCode: %s' % str(iret)+' - '+ErrorFPS)
                        print('ErrorCode: %s' % ErrorFPS+', Exist ID = '+str(iret)+', Enrolled id = '+str(enrollid))
                else:
                    WriteServerTransmitter('Failed to capture third finger')
                    print('Failed to capture third finger')
            else:
                WriteServerTransmitter('Failed to capture second finger')
                print('Failed to capture second finger')
        else:
            WriteServerTransmitter('Failed to capture first finger')
            print('Failed to capture first finger')
    else:
        WriteServerTransmitter('Failed: enroll storage is full')
        print('Failed: enroll storage is full')

# if __name__ == '__main__':
fps = FPS.FPS_GT511C3(device_name=FPS.DEVICE_NAME, baud=9600, timeout=2, is_com=False) #settings for raspberry pi GPIO
fps.Open()
fps.UseSerialDebug = False
if fps.SetLED(True) and ErrorCount == 0:
    fps.SetLED(False)
    LegacyEnroll(fps)
    fps.SetLED(False)
