#!/bin/sh
#------- JobSeeker Code Config --------#
rm -rf /var/www/html/fortune/app/tmp
mkdir -p  /var/www/html/fortune/app/tmp/cache/persistent
mkdir -p  /var/www/html/fortune/app/tmp/cache/models
mkdir -p  /var/www/html/fortune/app/tmp/cache/masters
mkdir -p  /var/www/html/fortune/app/tmp/logs
chmod -R 777  /var/www/html/fortune/app/tmp
rm -rf  /var/www/html/fortune/app/Config/core.php
ln -s  /var/www/html/fortune/app/Config/core_prod.php  /var/www/html/fortune/app/Config/core.php
rm -rf  /var/www/html/fortune/app/Config/database.php
ln -s  /var/www/html/fortune/app/Config/database_prod.php  /var/www/html/fortune/app/Config/database.php
rm -rf  /var/www/html/fortune/app/Config/mycore.php
ln -s  /var/www/html/fortune/app/Config/mycore_prod.php  /var/www/html/fortune/app/Config/mycore.php
rm -rf  /var/www/html/fortune/app/Config/email.php
ln -s  /var/www/html/fortune/app/Config/email_prod.php  /var/www/html/fortune/app/Config/email.php





chown ec2-user:www -R /var/www/html/fortune



#------- Balle Balle Deployment ho gayi -------#

echo "Balle Balle Deployment ho gayi"> /tmp/deployed_fortune.txt
