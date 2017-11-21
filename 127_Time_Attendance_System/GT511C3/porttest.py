import FPS, sys,dfasdf
DEVICE_GPIO = '/dev/ttyAMA0'
DEVICE_LINUX = '/dev/ttyUSB0'
DEVICE_MAC = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS = 'COM5'
FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_LINUX


fps = FPS.FPS_GT511C3(device_name=DEVICE_LINUX, baud=9600, timeout=1, is_com=False)  # settings for raspberry pi GPIO)
print(fps)