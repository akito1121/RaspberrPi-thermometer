#coding: utf-8
 
import bme280_custom
 
csv = bme280_custom.readData()
list = csv.split(",")
 
press = list[0]
temp = list[1]
hum = list[2]
 
print ("temp = " + temp)
print ("hum = " + hum)
print ("press = " + press)