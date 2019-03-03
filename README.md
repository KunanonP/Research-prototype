Requirement
computer with Microsoft Windows operating system
Apache server
MySQL database server
(Both Apache server and MySQL can be used XAMPP application to run simulator server)

Installation
clone project to your local platform
Testing on local server using XAMPP application

copy folder every folder to your apache server
(*if you use XAMPP you can copy rp folder to C:xampphtdocs*)

copy folder rp_db to your MySQL database server
(if you use XAMPP you can copy rp_db folder to C:xamppmysqldata)

Configuration
Apache configuration
in "applicationconfigconfig.php"

change the configuration with your own URL at

such as

--> $config['base_url'] = http://localhost/rp/;
Database configuration
in rpapplicationconfigdatabase.php

change the configuration with your own database credential at

such as

--> 'hostname' => 'localhost',
'username' => 'root', 'password' => '1234', 'database' => 'rp_db',
Files naming and major dirrectory
Major folder is "application"

Config folder/files are used for config everything such as database, config, route, and etc.
database.php is used for set up database connection.
config.php is used for set up base url, security, cookies, and etc. that come with the CodeIgniter framework.
route.php is used for set up web page route of every web page and function.
Controllers folder/files are using 'c' following by name such as cHome.php, cRegister.php, cLogin.php, etc.
Models folder/files are using 'm' following by model name such as mProduct.php, mCart.php, mUser.php, etc.
Views folder/files are using 'v' following by view name such as vHome.php, vMyaccount.php, vUser.php, etc.
OR
you can access to my web application by http://kunanonp.azurewebsites.net/ for testing online prototype