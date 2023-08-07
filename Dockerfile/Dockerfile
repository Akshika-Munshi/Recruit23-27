FROM debian:buster-slim

RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y cron && \
    echo "Root flag goes here" > /root/root.txt

RUN touch /home/root.sh && \
    chmod 766 /home/root.sh

COPY crontab /etc/crontab
CMD  service cron start && service cron restart

