FROM php:7.2-apache

MAINTAINER Heath Naylor <Heath@bythepixel.com>

# Update and source packages
RUN apt-get update -y \
  && apt-get install -y \
  zlib1g-dev \
  libjpeg-dev \
  libpng-dev \
  libfreetype6-dev \
  libcurl4-gnutls-dev \
  libxml2-dev \
  libmcrypt-dev \
  libjpeg62-turbo-dev \
  libvpx-dev \
  vim \
  redis-tools \
  && rm -rf /var/lib/apt/lists/*

# Phpize extensions
RUN docker-php-ext-install -j$(nproc) \
 pdo_mysql \
 mysqli

# GD config & install
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
             docker-php-ext-install gd && \
             docker-php-ext-install bcmath && \
             docker-php-ext-install mbstring

# Get redis & xdebug from pecl
RUN pecl install \
  redis-3.1.1 \
  && docker-php-ext-enable \
  redis

# Enable apache mods
RUN a2enmod \
  headers \
  rewrite \
  ssl \
  status \
  authz_host \
  include \
  proxy \
  proxy_http

# Prep directories
RUN mkdir /srv/logs
RUN chown www-data:www-data /srv -R

COPY . /srv/rescue-api
RUN mkdir -p /srv/rescue-api/temp
RUN mv /srv/rescue-api/provision /opt/provision

RUN mkdir -p /srv/logs
RUN chown www-data:www-data /srv -R

# Move config files into place
RUN cp /opt/provision/apache/apache2.conf /etc/apache2/apache2.conf
RUN cp /opt/provision/apache/sites-enabled/* /etc/apache2/sites-enabled
RUN rm -rf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /srv/rescue-api

ENTRYPOINT ["/opt/provision/entrypoint.sh"]
