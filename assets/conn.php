<?php
	
	$DBhost = "localhost";
	$DBuser = "surplusd_database";
	$DBpass = "surplusd_database";
	$DBname = "surplusd_database";
	
	try{
		
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
		$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $ex){
		
		die($ex->getMessage());
	}