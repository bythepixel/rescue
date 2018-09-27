#!/usr/bin/env bash

# xdebug
pecl install xdebug
docker-php-ext-enable xdebug

# Move ssl cert chain
mkdir -p /etc/pki/local
cp /opt/provision/apache/ca.* /etc/pki/local/

# Move PHP configs
cp /opt/provision/php/php.ini $PHP_INI_DIR/php.ini
cp /opt/provision/php/conf.d/developer.ini $PHP_INI_DIR/conf.d/developer.ini
cat /opt/provision/php/conf.d/30-xdebug.ini | \
    sed "s|_extensionFilePath|$(find /usr/local/lib/php/extensions/ -name 'xdebug.so')|g" \
    > $PHP_INI_DIR/conf.d/docker-php-ext-xdebug.ini

cat /opt/provision/php/conf.d/30-redis.ini |
    sed "s|_redisEndpoint|$REDIS_ENDPOINT|g" | \
    sed "s|_redisPort|6379|g" | \
    sed "s|_extensionFilePath|$(find /usr/local/lib/php/extensions/ -name 'redis.so')|g" \
> $PHP_INI_DIR/conf.d/docker-php-ext-redis.ini

# Handle the Apache config
cat /opt/provision/apache/sites-enabled/rescue-80.conf | \
    sed "s|_serverAlias|*.petlyplans.local|g" \
> /etc/apache2/sites-enabled/rescue-80.conf

cat /opt/provision/apache/sites-enabled/rescue-443.conf | \
    sed "s|_serverAlias|*.petlyplans.local|g" | \
    sed "s|_sslCertificateFile|/etc/pki/local/ca.crt|g" | \
    sed "s|_sslCertificateKeyFile|/etc/pki/local/ca.key|g" \
> /etc/apache2/sites-enabled/rescue-443.conf

php artisan migrate
php artisan db:seed

apache2-foreground
