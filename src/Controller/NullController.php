<?php 

namespace Gondr\Controller;

use Gondr\Controller\Controller;

class NullController extends Controller
{
	public function index($msg)
	{
		require $this->headerView;
		require $this->viewFolder . 'notfound.php';
		require $this->footerView;
	}
}