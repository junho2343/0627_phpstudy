<?php 
	function myLoader($className){
		$prefix = "Gondr\\";
		$base_dir = __DIR__.'/src/';


		$len = strlen($prefix);
		if(strncmp($prefix,$className,$len) !== 0){
			return;
		}

		//Gondr\Module\Humane
		$realName = substr($className, $len);
		//Module\Humane
		$file = $base_dir.str_replace("\\","/",$realName).'.php';
		//__DIR__/src/Module/Human.php

		if(file_exists($file)){
			require $file;
		}
	}


	spl_autoload_register('myLoader');
