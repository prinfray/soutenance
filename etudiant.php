<?php

session_start();
require_once('actions/connect.php');

$req = 'SELECT * FROM eleves WHERE id ='.$_GET['id'];