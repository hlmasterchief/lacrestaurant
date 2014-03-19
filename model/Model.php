<?php

require_once __DIR__.'/../vendor/NotORM.php';

abstract class Model {

	protected static $db;
	protected static $pdo;

	protected $id;
	protected $columns = array();
	protected $hidden  = array();
	protected $table   = "";
	protected $orm;

	public function setId($id) {
		$table = static::get_table();
		$table = self::$db->$table;
		$this->id = $id;
		$this->orm = $table[$this->id];
		$this->setLocal();
	}

	public function setLocal() {
		foreach ($this->orm as $col => $val) {
			$this->columns[$col] = $val;
		}
	}

	public function __set($name, $val) {
		$this->columns[$name] = $val;
	}

	public function __get($name) {
		return $this->columns[$name];
	}

	public static function all() {
		$models = array();
		$table  = self::get_table();
		$table  = self::$db->$table;
		foreach ($table as $result) {
			$model = new static();
			$model->setId($result["id"]);
			$models[] = $model;
		}
		return $models;
	}

	public static function find($id) {
		$model = new static();
		$model->setId($id);
		return $model;
	}

	public static function model_init() {
		$config = require_once __DIR__."/../config/db.php";
		$host = $config['host'];
		$user = $config['user'];
		$pass = $config['pass'];
		$dbname = $config['dbname'];
		self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
		self::$db  = new NotORM(self::$pdo);
	}

	public static function get_table() {
		$vars = get_class_vars(get_called_class());
		return $vars["table"];
	}

}

Model::model_init();