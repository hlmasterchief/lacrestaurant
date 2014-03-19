<?php

final class Database {

	private $pdo;

	public function __construct() {
		$config = require_once __DIR__.'/../config/database.php';

		$user   = $config["username"];
		$pass   = $config["password"];
		$dbname = $config["dbname"];
		$host   = $config["host"];

		$this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}

	private function _query($query, $inputs = array()) {
		$prepare = $this->pdo->prepare($query);
		foreach ($inputs as $col => $val) {
			$prepare->bindParam($col, $val);
		}
		$prepare->execute();
		return $prepare;
	}

	private function _select($table, $cols = array(), $where = array(), $limit = 0, $offset = 0) {
		$query = "SELECT ";
		$inputs = array();

		// cols
		if (count($cols) > 0) {
			$query .= implode(',', $cols);
		} else {
			$query .= '*';
		}

		// from
		$query .= " FROM $table";

		// where
		// $where = ["col" => ["expression", "value"]]
		if (count($where) > 0) {
			$query .= " WHERE ";
			$conds = array();

			foreach ($where as $col => $exp) {
				$conds[] = $col." ".$exp[0]." :".$col;
				$inputs[":".$col] = $exp[1];
			}

			$query .= implode(' AND ', $conds);
		}

		// limit
		if ($limit > 0) {
			if ($offset > 0) {
				$query .= " LIMIT $offset,$limit";
			} else {
				$query .= " LIMIT $limit";
			}
		} // limit

		$result = $this->_query($query, $inputs);
		return $result->fetchAll();
	}

	public function select($table, $cols = array(), $where = array(), $limit = 0, $offset = 0) {
		return $this->_select($table, $cols, $where, $limit, $offset);
	}

	public function selectAll($table, $cols = array()) {
		return $this->_select($table, $cols);
	}

	public function selectOne($table, $cols = array(), $where = array()) {
		$results = $this->_select($table, $cols, $where);
		return count($results) > 0 ? $results[0] : array();
	}

}