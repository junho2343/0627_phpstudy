<?php 

namespace Gondr\Controller;

use Gondr\Controller\Controller;

class HomeController extends Controller
{
	public function index()
	{
		require $this->headerView;
		require $this->viewFolder . 'home.php';
		require $this->footerView;
	}
}