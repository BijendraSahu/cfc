import subprocess
import os
import webbrowser
#proc = subprocess.call('start',shell=True)
#proc=subprocess.Popen('cd xampp\htdocs\anantara_new_design')
proc=subprocess.Popen('php artisan serve --host 192.168.2.20')

chromedir= "C:/Program Files (x86)/Google/Chrome/Application/chrome.exe %s"
webbrowser.get(chromedir).open("http://192.168.2.20:8000")