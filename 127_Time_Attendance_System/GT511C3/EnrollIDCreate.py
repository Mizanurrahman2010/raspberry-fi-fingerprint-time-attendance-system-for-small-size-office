import FPS, sys
DEVICE_GPIO = '/dev/ttyAMA0'
DEVICE_LINUX = '/dev/ttyUSB0'
DEVICE_MAC = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS = 'COM5'
FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_GPIO

fps = FPS.FPS_GT511C3(device_name=DEVICE_LINUX, baud=9600, timeout=5, is_com=False)  # settings for raspberry pi GPIO
fps.Open()

if fps.SetLED(True):
    fps.SetLED(False)
    FPS.delay(0.1)
    fps.SetLED(True)
    fps.SetLED(False)

    enrollid=0
    okid=False
    #search for a free enrollid, you have max 200
    while not okid and enrollid < 200:
        if fps.CheckEnrolled(enrollid):
            enrollid += 1
        else:
            okid = True

    if enrollid <200:
        print(enrollid)
    else:
        print('false')
