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

fps.SetLED(True)
# print('Press finger to Login')
while not fps.IsPressFinger():
    FPS.delay(1)

if fps.CaptureFinger(True):
    fps.SetLED(False)
    print(fps.Identify1_N())
    fps.Close()
else:
    print('Failed to capture your finger print')


