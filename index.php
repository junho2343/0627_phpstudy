<?php  
session_start();
require('vendor/autoload.php');

use Gondr\App\Application;
use Gondr\Module\Human;


$app = new Application(); 
/*$human = new Human("문준호",19);

echo $human->name;
echo $human->age;
*/

// psr-4 규칙 