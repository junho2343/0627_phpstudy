<?php 

namespace Gondr\Controller;

use Gondr\Controller\Controller;
use Gondr\Model\BoardModel;
use Gondr\App\DB;

class BoardController extends Controller
{
	public function index()
	{
		$this->list();
	}
	public function write()
	{

		require $this->headerView;
		require $this->viewFolder . "Board/write.php";
		require $this->footerView; 
	}
	public function view($idx)
	{
		$board_view = BoardModel::getModel()->getBoardView($idx);
		require $this->headerView;
		require $this->viewFolder . "Board/view.php";
		require $this->footerView; 
	}
	public function list(){
		
		$sql = "SELECT * FROM board ORDER BY idx DESC LIMIT :start, 10";
		$q = DB::getConnection()->prepare($sql);
		$q->bindValue(":start",0,\PDO::PARAM_INT);
		$q->execute();

		$list = $q->fetchAll();

		echo $this->blade->view()->make('boardlist',['list'=>$list])->render();
		// $board_list = BoardModel::getModel()->getBoardList();
	}
	public function add()
	{
		$_SESSION['msg'] = '글작성 실패';
		if (isset($_POST["submit_insert_board"])) {
			BoardModel::getModel()->addBoard($_POST["title"], $_POST["content"],  $_POST["writer"]);
			$_SESSION['msg'] = '글작성 성공';
		}
		header('location: /board/index');
	}

	public function update()
	{
		$_SESSION['msg'] = '글수정 실패';
		if (isset($_POST["submit_update_board"])) {
			BoardModel::getModel()->updateBoard($_POST["idx"], $_POST["title"], $_POST["content"],  $_POST["writer"]);
			$_SESSION['msg'] = '글수정 성공';
		}
		header('location: /board/index');
	}

	public function del($idx)
	{
		BoardModel::getModel()->deleteBoard($idx);
		$_SESSION['msg'] = '글삭제 성공';
		header('location: ' . URL . 'board/index');
	}	 
}