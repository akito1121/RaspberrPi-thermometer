import urllib.request
import urllib.parse
import bme280_custom

csv = bme280_custom.readData()
list = csv.split(",")

#press
a = list[0]
#temp
b = list[1]
#hum
c = list[2]

posturl = 'http://*****************************************/receive.php'
#送信先設定
postrawdata = {'a':a,'b':b,'c':c}
#送信データセット
postdata = urllib.parse.urlencode(postrawdata)
postbyte = postdata.encode('utf-8')
#byte変換
response = urllib.request.urlopen(posturl, postbyte)
#post実行
body = response.read().decode('utf-8')
print(body)
#返り値表示