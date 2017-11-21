import RPi.GPIO as GPIO
import time

LedPin = 11    # pin11

def setup():
    GPIO.setmode(GPIO.BOARD)       # Numbers GPIOs by physical location
    GPIO.setup(LedPin, GPIO.OUT)   # Set LedPin's mode is output

def blink():
        GPIO.output(LedPin, GPIO.LOW)  # led on
        time.sleep(0.2)
        GPIO.output(LedPin, GPIO.HIGH) # led off
        time.sleep(0.1)
        GPIO.output(LedPin, GPIO.LOW)  # led on
        time.sleep(0.1)
        GPIO.output(LedPin, GPIO.HIGH) # led off

def destroy():
    GPIO.output(LedPin, GPIO.HIGH)   # led off
    GPIO.cleanup()                  # Release resource

if __name__ == '__main__':     # Program start from here
    setup()
    blink()
    destroy()