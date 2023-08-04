# BOOT2ROOT
Recruitment Tasks for 1st year's 

Nmap scan results:
```
Starting Nmap 7.80 ( https://nmap.org ) at 2023-08-04 17:04 +0530
Nmap scan report for 172.17.0.2
Host is up (0.00018s latency).
Not shown: 998 closed ports
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 7.9p1 Debian 10+deb10u2 (protocol 2.0)
| ssh-hostkey: 
|   2048 f9:00:d3:16:70:f5:8f:fb:b8:9b:50:14:1d:84:00:b9 (RSA)
|   256 0e:a8:13:80:85:18:e0:2e:bd:18:af:35:11:24:76:b3 (ECDSA)
|_  256 c0:cf:07:1c:ea:e7:e2:da:42:9c:ab:d6:6c:ed:97:aa (ED25519)
80/tcp open  http    Apache httpd 2.4.38 ((Debian))
|_http-server-header: Apache/2.4.38 (Debian)
|_http-title: Site doesn't have a title (text/html).
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 7.01 seconds
bash-5.1$ nmap -A 172.17.0.2 -p 234
Starting Nmap 7.80 ( https://nmap.org ) at 2023-08-04 17:05 +0530

bash-5.1$ nmap -A 172.17.0.2 -p234
Starting Nmap 7.80 ( https://nmap.org ) at 2023-08-04 17:05 +0530
Nmap scan report for 172.17.0.2
Host is up (0.00017s latency).

PORT    STATE SERVICE VERSION
234/tcp open  unknown
| fingerprint-strings: 
|   GenericLines, NULL: 
|     p3nt3&t{M4y_th3_F0rc3_b3_w1th_y0u}
|_    -----The Force is strong with this dome, but it is not the only signal we can follow.-------
1 service unrecognized despite returning data. If you know the service/version, please submit the following fingerprint at https://nmap.org/cgi-bin/submit.cgi?new-service :
SF-Port234-TCP:V=7.80%I=7%D=8/4%Time=64CCE281%P=x86_64-pc-linux-gnu%r(NULL
SF:,83,"\t\tp3nt3&t{M4y_th3_F0rc3_b3_w1th_y0u}\n\r-----The\x20Force\x20is\
SF:x20strong\x20with\x20this\x20dome,\x20but\x20it\x20is\x20not\x20the\x20
SF:only\x20signal\x20we\x20can\x20follow\.-------\n")%r(GenericLines,83,"\
SF:t\tp3nt3&t{M4y_th3_F0rc3_b3_w1th_y0u}\n\r-----The\x20Force\x20is\x20str
SF:ong\x20with\x20this\x20dome,\x20but\x20it\x20is\x20not\x20the\x20only\x
SF:20signal\x20we\x20can\x20follow\.-------\n");

Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 12.65 seconds
bash-5.1$ nmap 172.17.0.2 
Starting Nmap 7.80 ( https://nmap.org ) at 2023-08-04 17:10 +0530
Nmap scan report for 172.17.0.2
Host is up (0.00024s latency).
Not shown: 998 closed ports
PORT   STATE SERVICE
22/tcp open  ssh
80/tcp open  http
```
We can see that http port is open on port 80.
## HTTP `Look this at maximum brightness possible .lol`
##### Robots.txt
```
DisAllow:/login.html
DisAllow:/f1ag.txt
```
##### Login.html
We have a sql injectable login page on the website which comes on the screen only when we hover on it.

![Screenshot](screenshots/Screenshot%20from%202023-08-04%2018-38-37.png)

On making the sql query it returns all the data in the database to the user out of which we have only one admin whose credentials will lead us to the flag.
## UDP SCAN
```
sudo nmap -sU  172.17.0.2 -T5
Starting Nmap 7.80 ( https://nmap.org ) at 2023-08-04 18:51 +0530
Warning: 172.17.0.2 giving up on port because retransmission cap hit (2).
Nmap scan report for 172.17.0.2
Host is up (0.00045s latency).
Not shown: 982 open|filtered ports
PORT      STATE  SERVICE
161/udp   open   snmp
786/udp   closed concert
990/udp   closed ftps
1012/udp  closed sometimes-rpc1
1067/udp  closed instl_boots
1072/udp  closed cardax
1200/udp  closed scol
1886/udp  closed leoip
17845/udp closed unknown
19500/udp closed unknown
19683/udp closed unknown
20082/udp closed unknown
20540/udp closed unknown
21207/udp closed unknown
37144/udp closed unknown
40622/udp closed unknown
43686/udp closed unknown
45247/udp closed unknown
MAC Address: 02:42:AC:11:00:02 (Unknown)

Nmap done: 1 IP address (1 host up) scanned in 12.21 seconds
```
## Metasploit Exploit (auxiliary/scanner/snmp/snmp_enum

From the above clue, we can use snmp_enum in metasploit to get the flag the flag is stored in system information part.

```
[*] System information:

Host IP                       : 172.17.0.2
Hostname                      : 9c1a4d328e76
Description                   : Linux 9c1a4d328e76 6.0.2-76060002-generic #202210150739~1666289067~22.04~fe0ce53 SMP PREEMPT_DYNAMIC Thu O x86_64
Contact                       : imrightheredarth@starwars.space
Location                      : ⠏⠼⠉⠝⠞⠼⠉&⠞{⠍⠽⠸⠼⠉⠽⠼⠉⠑⠸⠼⠙⠗⠼⠉⠸⠼⠑⠕⠸⠙⠗⠽⠸⠼⠛⠓⠉⠽⠸⠍⠼⠁⠛⠓⠞⠸⠉⠗⠼⠙⠉⠅⠖}
Uptime snmp                   : 02:47:16.64
Uptime system                 : 01:30:13.73
System date                   : 2023-8-4 13:25:40.0
```
This is a braile encoded flag.


## SSH
From the hint from the sql challenge we get to know that the ssh username is anakin and we can have a bruteforcing attack on the ssh port with the wordlist rockyou.txt which is already readily instllled in Kali Linux
```
Password: skywalker123
```

## ROOTFLAG

From the hint in user.txt file we check the crontab to check whether there are any tasks scheduled to happpen

## crontab
```
SHELL=/bin/sh
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin

# Example of job definition:
# .---------------- minute (0 - 59)
# |  .------------- hour (0 - 23)
# |  |  .---------- day of month (1 - 31)
# |  |  |  .------- month (1 - 12) OR jan,feb,mar,apr ...
# |  |  |  |  .---- day of week (0 - 6) (Sunday=0 or 7) OR sun,mon,tue,wed,thu,fri,sat
# |  |  |  |  |
# *  *  *  *  * user-name command to be executed
17 *	* * *	root    cd / && run-parts --report /etc/cron.hourly
25 6	* * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.daily )
47 6	* * 7	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.weekly )
52 6	1 * *	root	test -x /usr/sbin/anacron || ( cd / && run-parts --report /etc/cron.monthly )
* * * * * root cd ./ && ./root.sh
#
``` 
we can see that a executable file always runs as  root user and that has rwx permissions for anakin from now there are many possible ways to get the root flag which stored in /root/root.txt.



