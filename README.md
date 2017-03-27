# PHP-MySQL-Multidump

A fork of MySQLDump : https://github.com/ifsnop/mysqldump-php

# How to use

You need to provide a valid MySQL connection to get all databases. It's necessary that it has permissions to dump. Automatically get own databses and make a zipped dump.

It's recommended to use as process using crontab or running into terminal, dump could take a long time, depending of databases size.

To run in terminal use php bin path: `/usr/bin`, `/usr/local/bin` or `/opt/lampp/bin`. PHP file path could be different.

Command: `/usr/bin/php -q /crons/dump.php`

# Backup

All databases will be compressed separately into `$backup_path`. 

#Crontab

If you want to run as cron, follow steps below:

1.- sudo nano /etc/crontab
2.- Add at the bottom `0 0 * * user /usr/bin/php -q /crons/dump.php`
3.- Save and close.

Read more about crontab       : http://www.adminschoice.com/crontab-quick-reference
Read more about dumping perms : http://patrickv.info/wordpress/2013/04/privileges-necessary-for-mysqldump/

#Credits

Thanks to @ifsnop
