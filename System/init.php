<?php

require_once 'vendor/Autoload.php';
require_once 'Application/Config/database.php';
require_once 'Application/Config/autoload.php';
require_once 'Application/Config/config.php';


foreach($autoload as $keys => $values){
	foreach($values as $value){
		require_once 'System/' . $keys . '/' . $value . '.php';
	}
}
