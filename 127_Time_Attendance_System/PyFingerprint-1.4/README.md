# Python library for ZFM-20 fingerprint sensor

The PyFingerprint library allows to use the ZhianTec ZFM-20 fingerprint sensor on the Raspberry Pi or other Linux machines.

**Note:** The library is inspired by the C++ library from Adafruit Industries:  
<https://github.com/adafruit/Adafruit-Fingerprint-Sensor-Library>

## Package building

**Note:** This should work properly on Debian 7 (Wheezy) and Debian 8 (Jessie).

First install the packages for building:

    ~$ sudo apt-get install devscripts

Than clone this repository:

    ~$ git clone https://github.com/bastianraschke/pyfingerprint.git

Build the package:

    ~$ cd ./pyfingerprint/src/
    ~$ debuild

## Installation

Install the built Debian package:

    ~$ sudo dpkg -i ../python-fingerprint*.deb

Install missing dependencies:

    ~$ sudo apt-get -f install

Allow non-root user "pi" (replace it correctly) to use the serial port devices:

    ~$ sudo usermod -a -G dialout pi
    ~$ sudo reboot

## How to use the library

### Enroll a new finger

    ~$ python2 /usr/share/doc/python-fingerprint/examples/example_enroll.py

### Search an enrolled finger

    ~$ python2 /usr/share/doc/python-fingerprint/examples/example_search.py

### Delete an enrolled finger

    ~$ python2 /usr/share/doc/python-fingerprint/examples/example_delete.py

### Download image of a scanned finger

    ~$ python2 /usr/share/doc/python-fingerprint/examples/example_downloadimage.py

## Questions

If you have any questions to this project, just ask me via email:

<bastian.raschke@posteo.de>
