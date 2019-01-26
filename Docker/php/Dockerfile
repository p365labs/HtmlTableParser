FROM php:7.1-alpine

USER root

RUN apk add --no-cache \
		git \
        bzip2-dev \
        libxml2-dev \
        icu-dev \
        g++ \
        curl \
        libmcrypt-dev \
        php7-tidy \
        tzdata \
        shadow \
        $PHPIZE_DEPS \
        vim \
        acl \
        sudo \
	&& docker-php-ext-install -j2 \
	    bz2 \
	    calendar \
	    iconv \
		mbstring \
		mcrypt \
		intl \
		dom \
		zip \
		bcmath \
		soap \
		zip \
		opcache \
	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug \
	&& pecl clear-cache \
	&& kill -USR2 1

##pecl/xdebug is already installed and is the same as the released version 2.6.1
## PHP Configuration

RUN echo "memory_limit=1024M" >> /usr/local/etc/php/conf.d/memory-limit.ini
RUN echo "date.timezone=UTC" >> /usr/local/etc/php/conf.d/timezone.ini

RUN apk add gnu-libiconv --update-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing/ --allow-untrusted
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

ENV TZ UTC
ENV COMPOSER_VENDOR_DIR "/var/www/html/vendor"

RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer \
		--version 1.7.2

ENTRYPOINT ["tail", "-f", "/dev/null"]

