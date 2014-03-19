<?php

require_once 'database/db.php';

$db = new Database();
$results = $db->selectAll("yup", array());
var_dump($results);