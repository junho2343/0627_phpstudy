<?php
namespace Gondr\App;

class DB
{
	private static $DB = null;
	private static $DBType = 'mysql';
	private static $DBHost = 'localhost';
	private static $DBName = 'test';
	private static $DBUser = 'root';
	private static $DBPass = '';

	public static function getConnection()
	{
		if(is_null (self::$DB)){
			$options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, 
							\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING);
			self::$DB = new \PDO(self::$DBType . ':host=' . self::$DBHost . ';dbname=' . self::$DBName . ';charset=utf8', self::$DBUser, self::$DBPass, $options);
		}
		return self::$DB;
	}
}