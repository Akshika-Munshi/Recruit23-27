

FROM debian:buster-slim
#smtp chall
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y snmpd
COPY ./snmpd.conf /etc/snmp/snmpd.conf
EXPOSE 161

# nmap flag
RUN apt-get update && apt-get install -y netcat-openbsd
COPY nmap-service-probes /usr/share/nmap/nmap-service-probes
EXPOSE 234


#apache and sql servers for http chall
RUN apt-get update && apt-get install -y \
    apache2 \
    libapache2-mod-php \
    php \
    php-mysql \
    mariadb-server
RUN service mysql start && \
    mysql -e "CREATE USER 'user1'@'localhost' IDENTIFIED BY 'pass123';" && \
    mysql -e "CREATE DATABASE recruitment;" && \
    mysql -e "GRANT ALL PRIVILEGES ON recruitment.* TO 'user1'@'localhost';" && \
    mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'user1'@'localhost';" && \
    mysql -e "USE recruitment; CREATE TABLE users (username VARCHAR(255), password VARCHAR(255));" && \
    mysql -u user1 -ppass123 recruitment -e "INSERT INTO users (username, password) VALUES ('johnDoe', 'Passw0rd!'); \
    INSERT INTO users (username, password) VALUES ('sarahSmith', '1234Abcd!'); \
    INSERT INTO users (username, password) VALUES ('mikeJohnson', '0n3M1k3P@ss'); \
    INSERT INTO users (username, password) VALUES ('emmaBrown', 'Br0wnEyes!'); \
    INSERT INTO users (username, password) VALUES ('davidLee', 'L33tD@vid!'); \ 
    INSERT INTO users (username, password) VALUES ('jessicaMiller', 'J3s$1c@M!ll'); \
    INSERT INTO users (username, password) VALUES ('alexWilson', 'W!ls0nAlex'); \
    INSERT INTO users (username, password) VALUES ('lisaDavis', 'Dav1sL!sa'); \
    INSERT INTO users (username, password) VALUES ('danielTaylor', 'Tayl0rD@niel'); \
    INSERT INTO users (username, password) VALUES ('sophiaAnderson', 'S0ph!aAnder');" && \
    mysql -u user1 -ppass123 recruitment -e "INSERT INTO users (username, password) VALUES('JaneSmith', 'p@2Gx$k9'),('MichaelJohnson', '5&Vv@d#s'),('EmilyBrown', 'j!6Lz$Gx'),('DavidWilson', '9*pB4$#y'),('OliviaDavis', 's7$2Y6@h'),('DanielTaylor', 'x3K@8g!J'),('SophiaMiller', '4#rT5x!u'),('MatthewAnderson', 'm$7&hX1z'),('AvaThomas', 'a!3Nf@2X'),('admin', 'nimda!@'),('LilyJones', '@p9sK4bZ'),('NoahBrown', '3m@5Xp!r'),('SophiaDavis', 'G8$dF3#q'),('EthanWilson', '6n!Qs9pC'),('IsabellaThomas', '#b2R4k!y'),('LucasMiller', 'W5@tJ6fK'),('MiaAnderson', '!gT9mZ4n'),('AlexanderSmith', '1@hY8cB2'),('AvaJohnson', 'R7!xP4kD'),('BenjaminTaylor', 'K2!wT5fN');" && \
    mysql -e "FLUSH PRIVILEGES;"

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
# RUN echo "Listen 172.17.0.2:80" > /etc/apache2/ports.conf
# RUN sed -i 's/VirtualHost *:80/VirtualHost 172.17.0.2:80/g' /etc/apache2/sites-available/000-default.conf
COPY ./app /var/www/html
EXPOSE 80




# ssh login
RUN apt-get install -y openssh-server
RUN useradd -m -s /bin/bash anakin \
    && echo "anakin:skywalker123" | chpasswd \
    && echo "root:modayanobro@123" | chpasswd
RUN mkdir /run/sshd
EXPOSE 22



# Files inside ssh
RUN mkdir /home/anakin/.ssh
RUN mkdir /home/anakin/Downloads
RUN mkdir /home/anakin/Desktop
RUN mkdir /home/anakin/Pictures
RUN mkdir /home/anakin/Documents
RUN mkdir /home/anakin/Videos
RUN mkdir /home/anakin/Music
COPY ./user.txt /home/anakin/user.txt
#Steganography files
COPY ./Master_Darth_lvl2.jpg /home/anakin/.ssh/Master_Darth.jpg
COPY ./baby_Darth_lvl1.jpg /home/anakin/Pictures/Baby_Darth.jpg




# root etc...

RUN apt-get install -y cron

RUN echo "----p3nt35t{Y0ur_f0cus_d3t3rm1n3s_y0ur_r3ality}----" > /root/root.txt

RUN touch /root.sh && \
    chmod 777 /root.sh && \
    (crontab -l ; echo "* * * * * cd / && /bin/bash root.sh") | crontab -






#sql, http, ssh, nc, snmp initialisation
CMD while true; do echo '\t\tp3nt35t{M4y_th3_F0rc3_b3_w1th_y0u}\n\r-----The Force is strong with this dome, but it is not the only signal we can follow.-------' | nc -lp 234;done & \
    /usr/sbin/sshd -D & \
    service snmpd start & \
    service mysql start & \
    service cron restart & \
    /usr/sbin/apache2ctl -D FOREGROUND

#nmap nc initialisation
#CMD while true; do echo '-----The Force is strong with this dome, but it is not the only signal we can follow.-------' | nc -l 127.0.0.1 234; done
#CMD ["/bin/bash", "-c", "while true; do echo '-----The Force is strong with this dome, but it is not the only signal we can follow.-------' | nc -lp 234; done"]


#1. p3nt35t{M4y_th3_F0rc3_b3_w1th_y0u} - nmap
#2. p3nt35t{my_3y35_4r3_5o_dry_7h3y_m178t_cr43k!} - snmp
#3. p3nt35t{7HErEs_AlwAys_4_BI9ger_F1sh} - f1ag.txt - robots.txt flag
#5. p3nt35t({w31Com3_70_tHe_DarK_5Ide} - sql flag
#5. p3nt35t{_I_4m_y0ur_f4th3r} - user flag
#6. p3nt35t{TH3_F0rCe_4w4KEn5} - baby darth image flag
#7. p3nt35t{DO_0r_do_NO7_!_th3rE_iS_n0_7ry} - jar file flag
#8. p3nt35t{Y0ur_f0cus_d3t3rm1n3s_y0ur_r3ality} - root
