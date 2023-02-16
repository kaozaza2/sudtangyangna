FROM php:7.4-cli

ENV DEBIANFRONTEND nointeractive

WORKDIR /app

COPY . .

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
    pecl install swoole && \
    docker-php-ext-enable swoole && \
    apt purge --yes \
      libfreetype6-dev \
      libjpeg62-turbo-dev && \
    rm -rf Dockerfile /tmp/*

CMD ["php", "server.php"]
