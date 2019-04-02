# Features
- Recommendation system 
 	- Content-Based recommendation 
  		- Purchase history 
 	- Addition 
  		- Rating, 
  		- Visiting history, 
  		- Keyword search method
- Interactive interface. 
- Visualization of order processing. 
- Online payment methods.
	- Connect to Paypal (sandbox).
- Orders generator.

# Requirement

* computer with Microsoft Windows operating system
* Apache server
* MySQL database server
(Both Apache server and MySQL can be used XAMPP application to run simulator server)

# Installation
* clone project to your local platform
Testing on local server using XAMPP application

* copy folder every folder to your apache server
(*if you use XAMPP you can copy rp folder to C:xampp/htdocs*)

* copy folder rp_db to your MySQL database server
(if you use XAMPP you can copy rp_db folder to C:xampp/mysql/data)

# Configuration

## change the configuration with your own URL
Apache configuration in "application/config/config.php"

for example
`--> $config['base_url'] = http://localhost/rp/;`


## change the configuration with your own database credential
Database configuration in application/config/database.php

for example
`--> 'hostname' => 'localhost',`
`'username' => 'root',`
`'password' => '1234',`
`'database' => 'rp_db',`

## Files naming and major dirrectory

Major folder is "application"

* Config folder/files are used for config everything such as database, config, route, and etc.
	* database.php is used for set up database connection.
	* config.php is used for set up base url, security, cookies, and etc. that come with the CodeIgniter framework.
	* route.php is used for set up web page route of every web page and function.
* Controllers folder/files are using 'c' following by name such as cHome.php, cRegister.php, cLogin.php, etc.
* Models folder/files are using 'm' following by model name such as mProduct.php, mCart.php, mUser.php, etc.
* Views folder/files are using 'v' following by view name such as vHome.php, vMyaccount.php, vUser.php, etc.

# Online Prototype
Access to my web application by http://kunanonp.azurewebsites.net/ for testing online prototype


# Protoype documents
        
* [Prototype report.pdf](https://github.com/KunanonP/Research-prototype/blob/master/prototype%20report%20documents/Report.pdff)

* [Prototype summary.pdf](https://github.com/KunanonP/Research-prototype/blob/master/prototype%20report%20documents/presentation.pdf)
