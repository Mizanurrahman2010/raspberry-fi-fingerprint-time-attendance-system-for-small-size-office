import FPS, sys
DEVICE_GPIO = '/dev/ttyAMA0'
DEVICE_LINUX = '/dev/ttyUSB0'
DEVICE_MAC = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS = 'COM5'
FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_LINUX



fps = FPS.FPS_GT511C3(device_name=DEVICE_LINUX, baud=9600, timeout=1, is_com=False)  # settings for raspberry pi GPIO
# fps.SetLED(True)

while not fps.IsPressFinger():
    FPS.delay(0.1)
# iret = 0
if fps.CaptureFinger(True):
    EnrollStatus = fps.Enroll3()

    if EnrollStatus == 0:
        print('Enrolled')
    elif EnrollStatus == 1:
        print('NACK_ENROLL_FAILED')
    elif EnrollStatus == 2:
        print('NACK_BAD_FINGER')
    else:
        print('Unknown Cause!')

else:
    print('CaptureFailed')

# fps.SetLED(False)
# fps.Close()