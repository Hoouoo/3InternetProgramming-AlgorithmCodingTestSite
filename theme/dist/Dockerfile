#Use the Ubuntu base image
FROM ubuntu:18.04
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get -y install apache2 software-properties-common

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php

RUN apt-get update && apt-get install -y libapache2-mod-php7.0 php7.0 php7.0-cli php7.0-mysql

#Update all packages
RUN apt-get update

#Install Software Properties
RUN apt-get update && \
    apt-get install -y software-properties-common && \
    rm -rf /var/lib/apt/lists/*

#Install C/C++ Compiler
RUN add-apt-repository -y ppa:ubuntu-toolchain-r/test
RUN apt-get update -y
RUN apt-get install -y gcc-4.8
RUN apt-get install -y g++-4.8
RUN ln -f -s /usr/bin/gcc-4.8 /usr/bin/gcc
RUN ln -f -s /usr/bin/g++-4.8 /usr/bin/g++

#Install Java Compiler
RUN add-apt-repository -y ppa:openjdk-r/ppa
RUN apt-get update -y
RUN apt install -y openjdk-8-jre
RUN apt-get install -y default-jdk

#Remove any unnecessary files
RUN apt-get clean
EXPOSE 80

#Start services
CMD /usr/sbin/apache2ctl -D FOREGROUND

