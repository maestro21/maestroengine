<?php
 $_CONF = new Config(
     'http://localhost/maestroengine/trends/',

     new DBConfig(
         'localhost',
         'root',
         '',
         'trends',
         'mysql',
         'C:/xampp/mysql/bin/mysql.exe',
         'C:/xampp/mysql/bin/mysqldump.exe'
     ),
     'en',
     'trends'
 );

