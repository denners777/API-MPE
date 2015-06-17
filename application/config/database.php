<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | DATABASE CONNECTIVITY SETTINGS
  | -------------------------------------------------------------------
  | This file will contain the settings needed to access your database.
  |
  | For complete instructions please consult the 'Database Connection'
  | page of the User Guide.
  |
  | -------------------------------------------------------------------
  | EXPLANATION OF VARIABLES
  | -------------------------------------------------------------------
  |
  |	['hostname'] The hostname of your database server.
  |	['username'] The username used to connect to the database
  |	['password'] The password used to connect to the database
  |	['database'] The name of the database you want to connect to
  |	['dbdriver'] The database type. ie: mysql.  Currently supported:
  mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
  |	['dbprefix'] You can add an optional prefix, which will be added
  |				 to the table name when using the  Active Record class
  |	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
  |	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
  |	['cache_on'] TRUE/FALSE - Enables/disables query caching
  |	['cachedir'] The path to the folder where cache files should be stored
  |	['char_set'] The character set used in communicating with the database
  |	['dbcollat'] The character collation used in communicating with the database
  |				 NOTE: For MySQL and MySQLi databases, this setting is only used
  | 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
  |				 (and in table creation queries made with DB Forge).
  | 				 There is an incompatibility in PHP with mysql_real_escape_string() which
  | 				 can make your site vulnerable to SQL injection if you are using a
  | 				 multi-byte character set and are running versions lower than these.
  | 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
  |	['swap_pre'] A default table prefix that should be swapped with the dbprefix
  |	['autoinit'] Whether or not to automatically initialize the database.
  |	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
  |							- good for ensuring strict SQL while developing
  |
  | The $active_group variable lets you choose which connection group to
  | make active.  By default there is only one group (the 'default' group).
  |
  | The $active_record variables lets you determine whether or not to load
  | the active record class
 */

$active_group = 'default';
$active_record = TRUE;

$host = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.1)(PORT = 1521))
    (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = PROD)))';

$db['default']['hostname'] = $host;
$db['default']['username'] = 'NUCLEO';
$db['default']['password'] = 'secret';
$db['default']['database'] = '';
$db['default']['dbdriver'] = 'oci8';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = getcwd() . '/files/cache/bd/';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;
$db['default']['save_queries'] = TRUE;

$host2 = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.1)(PORT = 1521))
    (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = RM)))';

$db['rm']['hostname'] = $host2;
$db['rm']['username'] = 'PRODUCAO';
$db['rm']['password'] = 'secret';
$db['rm']['database'] = '';
$db['rm']['dbdriver'] = 'oci8';
$db['rm']['dbprefix'] = '';
$db['rm']['pconnect'] = TRUE;
$db['rm']['db_debug'] = TRUE;
$db['rm']['cache_on'] = FALSE;
$db['rm']['cachedir'] = getcwd() . '/files/cache/bd/';
$db['rm']['char_set'] = 'utf8';
$db['rm']['dbcollat'] = 'utf8_general_ci';
$db['rm']['swap_pre'] = '';
$db['rm']['autoinit'] = TRUE;
$db['rm']['stricton'] = FALSE;

$host3 = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.1)(PORT = 1521))
    (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = PROTHEUS)))';

$db['protheus']['hostname'] = $host3;
$db['protheus']['username'] = 'PRODUCAO';
$db['protheus']['password'] = 'secret';
$db['protheus']['database'] = '';
$db['protheus']['dbdriver'] = 'oci8';
$db['protheus']['dbprefix'] = '';
$db['protheus']['pconnect'] = TRUE;
$db['protheus']['db_debug'] = TRUE;
$db['protheus']['cache_on'] = FALSE;
$db['protheus']['cachedir'] = getcwd() . '/files/cache/bd/';
$db['protheus']['char_set'] = 'utf8';
$db['protheus']['dbcollat'] = 'utf8_general_ci';
$db['protheus']['swap_pre'] = '';
$db['protheus']['autoinit'] = TRUE;
$db['protheus']['stricton'] = FALSE;

$db['otrs']['hostname'] = '192.168.1.4';
$db['otrs']['username'] = 'otrs';
$db['otrs']['password'] = 'secret';
$db['otrs']['database'] = 'otrs';
$db['otrs']['dbdriver'] = 'mysql';
$db['otrs']['dbprefix'] = '';
$db['otrs']['pconnect'] = TRUE;
$db['otrs']['db_debug'] = FALSE;
$db['otrs']['cache_on'] = FALSE;
$db['otrs']['cachedir'] = getcwd() . '/files/cache/bd/';
$db['otrs']['char_set'] = 'utf8';
$db['otrs']['dbcollat'] = 'utf8_general_ci';

/* End of file database.php */
/* Location: ./application/config/database.php */