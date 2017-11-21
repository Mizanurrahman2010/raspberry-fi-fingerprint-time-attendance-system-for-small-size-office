import FPS, sys
DEVICE_GPIO = '/dev/ttyAMA0'
DEVICE_LINUX = '/dev/ttyUSB0'
DEVICE_MAC = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS = 'COM5'
FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_LINUX

enrollid = int(sys.argv[1])

fps = FPS.FPS_GT511C3(device_name=DEVICE_LINUX, baud=9600, timeout=2, is_com=False)  # settings for raspberry pi GPIO)

fps.SetLED(False)
if fps.SetLED(True):

    EnrollStartStatus = fps.EnrollStart(enrollid)

    if EnrollStartStatus == 0:

        while not fps.IsPressFinger():
            FPS.delay(0.1)

        if fps.CaptureFinger(False):
            EnrollStatus = int(fps.Enroll1())
            # fps.SetLED(False)
            if EnrollStatus == 0:
                print('Enrolled')
            elif EnrollStatus == 1:
                print('NACK_ENROLL_FAILED')
            elif EnrollStatus == 2:
                print('NACK_BAD_FINGER')
            elif EnrollStatus == 3:
                print('ID is used')
            else:
                print('Unknown Cause!')
        else:
            print('CaptureFailed')
    else:
        if EnrollStartStatus == 1:
            print('NACK_DB_IS_FULL')
        elif EnrollStartStatus == 2:
            print('NACK_INVALID_POS')
        elif EnrollStartStatus == 3:
            print('NACK_IS_ALREADY_USED')

        # 0 = ['OK]
        # 1 = ['NACK_DB_IS_FULL']
        # 2 = ['NACK_INVALID_POS']
        # 3 = ['NACK_IS_ALREADY_USED']



