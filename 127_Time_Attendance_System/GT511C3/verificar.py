'''
Created on 08/04/2014

@author: jeanmachuca
'''
import FPS, sys
from test_raw import *

DEVICE_GPIO = '/dev/ttyAMA0'
DEVICE_LINUX = '/dev/ttyUSB0'
DEVICE_MAC = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS = 'COM3'
FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_LINUX

FPS_Directory = '/var/www/html/GT511C3/'

if __name__ == '__main__':
    fps = FPS.FPS_GT511C3(device_name=DEVICE_LINUX, baud=9600, timeout=2, is_com=False)
    fps.UseSerialDebug = True

    fps.SetLED(True)
    print('Press finger')
    while not fps.IsPressFinger():
        FPS.delay(1)

    if fps.CaptureFinger(True):
        fps.SetLED(False)
        print(fps.Verify1_1(0))
        fps.Close()
    else:
        print('Failed to capture')

    pass
    

