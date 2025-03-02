FROM ubuntu:20.04

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    php-mysql \
    libapache2-mod-php

WORKDIR /var/www/html

COPY . .

RUN echo "ServerName 10.10.0.2" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite

EXPOSE 8080

CMD ["apachectl", "-D", "FOREGROUND"]
