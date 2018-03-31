FROM php:5.6-fpm

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    libmcrypt-dev \
    zlib1g-dev \
    libz-dev \
    libmemcached-dev \
    libxml2-dev \
    libmemcached11  \
    build-essential \
    libicu-dev \
    libgeoip-dev \
    libmagickwand-dev && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Kiev /etc/localtime
RUN "date"

# Xcache
RUN curl -fsSL 'https://xcache.lighttpd.net/pub/Releases/3.2.0/xcache-3.2.0.tar.gz' -o xcache.tar.gz \
    && mkdir -p xcache \
    && tar -xf xcache.tar.gz -C xcache --strip-components=1 \
    && rm xcache.tar.gz \
    && ( \
        cd xcache \
        && phpize \
        && ./configure --enable-xcache \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r xcache \
    && docker-php-ext-enable xcache

# imagick
RUN pecl install imagick-3.4.1 && docker-php-ext-enable imagick

# Apcu
RUN pecl install APCu-4.0.10

RUN docker-php-ext-configure intl

RUN docker-php-ext-install mcrypt pdo pdo_mysql gd xml soap intl opcache

RUN docker-php-ext-enable xml opcache apcu

RUN echo "opcache.max_accelerated_files = 20000" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

RUN echo 'alias art="php artisan"' >> ~/.bashrc

# Installation node.js
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
	apt-get update && apt-get install -y nodejs && \
	npm install npm@latest -g

	# Installation of Gulp
RUN npm install -g gulp

    # Installation of Bower
RUN npm install -g bower

COPY php.ini /usr/local/etc/php/

WORKDIR /var/www/v2board
