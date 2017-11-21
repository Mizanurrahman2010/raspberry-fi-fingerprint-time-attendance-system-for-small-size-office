'''
Created on 08/04/2014

@author: jeanmachuca
'''
import FPS, sys

DEVICE_GPIO = '/dev/ttyAMA0'
DEVICE_LINUX = '/dev/ttyUSB0'
DEVICE_MAC = '/dev/cu.usbserial-A601EQ14'
DEVICE_WINDOWS = 'COM3'
FPS.BAUD = 9600
FPS.DEVICE_NAME = DEVICE_LINUX

FPS_Directory = '/var/www/html/GT511C3/'

fps = FPS.FPS_GT511C3(device_name=DEVICE_LINUX, baud=9600, timeout=2, is_com=False)
fps.Open()
fps.UseSerialDebug = False

# print('Press finger to Login'))

if fps.IsPressFinger():
    fps.Close()
    print(True)
else:
    print(False)


