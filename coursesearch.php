<?php

// $conn created in this file is a PDO object
require_once '../../php/mysql.php';

$query = "SELECT * FROM cs383.master_schedule";

$clauses = [];

if(array_key_exists('sub', $_GET))
	$clauses[] = "sub = '{$_GET['sub']}'";
if(array_key_exists('num', $_GET))
	$clauses[] = "num = '{$_GET['num']}'";
if(array_key_exists('sec', $_GET))
	$clauses[] = "sec = '{$_GET['sec']}'";

if(count($clauses))
	$query .= " WHERE " . implode(" AND ", $clauses);

$query .= " ORDER BY sub, num, sec";

$data = $conn->query($query)->fetchAll();

echo json_encode($data);
