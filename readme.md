Save Me Read Me
===============

Requirements
------------
- CodeIgniter 2.0.1
- [php-readability](https://github.com/feelinglucky/php-readability)
- [Tank Auth](http://konyukhov.com/soft/tank_auth/)

Instructions
-------------
1.  Put Readability.inc.php in controllers folder
2.  Run database.sql

###config/autoload.php
`$autoload['libraries'] = array('database');`
`$autoload['helper'] = array('url');`

TODO
----
1.  More MVC: make article into a model
2.  Check for duplicate urls before inserting into database
3.  Finish design