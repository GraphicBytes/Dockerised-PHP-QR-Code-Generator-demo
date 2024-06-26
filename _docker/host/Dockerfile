FROM php:8.1.9-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    IPE_GD_WITHOUTAVIF=1 install-php-extensions mysqli bcmath bz2 calendar dba enchant exif gettext gmp imap intl ldap odbc opcache pdo_mysql pdo_odbc pdo_pgsql pgsql pspell soap sockets sysvmsg sysvsem sysvshm tidy xsl zip gd

RUN apt-get update && apt-get upgrade -y
RUN a2enmod rewrite
RUN service apache2 restart