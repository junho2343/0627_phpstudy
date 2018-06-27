<?php 
namespace Gondr\Controller;

use Philo\Blade\Blade;

class Controller
{
	protected $viewFolder = 'src/Views/';
	protected $headerView = 'src/Views/header.php';
	protected $footerView = 'src/Views/footer.php';

	protected $views = __DIR__ . "/../blade/views";
	protected $cache = __DIR__ . "/../blade/cache";

	protected $blade;

	public function __construct(){
		$this->blade = new Blade($this->views,$this->cache);
	}

}