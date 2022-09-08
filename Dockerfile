FROM php:7.4-apache

ENV DEBIANFRONTEND nointeractive

COPY app/ .

RUN set -eux && \
    docker-php-ext-install mysqli && \
    apt update && \
    apt install --no-install-recommends --yes \
      libfreetype6-dev \
      libjpeg62-turbo-dev && \
    docker-php-ext-configure gd \
      --with-freetype=/usr/include/ \
      --with-jpeg=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-enable gd && \
    apt purge --yes \
      libfreetype6-dev \
      libjpeg62-turbo-dev && \
    rm -rf Dockerfile /tmp/*
