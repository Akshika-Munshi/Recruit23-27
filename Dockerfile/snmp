FROM debian:buster-slim

RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y snmpd

COPY snmpd.conf /etc/snmp/snmpd.conf

RUN service snmpd start
