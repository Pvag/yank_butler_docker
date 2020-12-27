<?php
$pdo = new \PDO('mysql:host=yank;dbname=ijdb;charset=utf8', 'coder', 'coder');
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
