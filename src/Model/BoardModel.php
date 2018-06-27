<?php 

namespace Gondr\Model;

use Gondr\App\DB;

class BoardModel
{
	private static $boardModel;

	public static function getModel()
	{
		if(is_null(self::$boardModel)){
			self::$boardModel = new BoardModel();
		}
		return self::$boardModel;
	}
	public function getBoardList()
	{
		$sql = "SELECT idx,title,writer,wdate FROM board";
		$query = DB::getConnection()->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function getBoardView($idx)
	{
		$sql = "SELECT * FROM board WHERE idx = {$idx}";
		$query = DB::getConnection()->prepare($sql);
		$query->execute();
		return $query->fetch();
	}
	public function addBoard($title, $content, $writer)
	{
		$title = strip_tags($title);
		$content = strip_tags($content);
		$writer = strip_tags($writer);
		$sql = "INSERT INTO board (title, content, writer, wdate) VALUES (:title, :content, :writer, :wdate)";
		$query = DB::getConnection()->prepare($sql);
		$query->execute(array(':title' => $title, ':content' => $content, ':writer' => $writer, ':wdate' => date("Y-m-d H:i:s")));
	}
	public function updateBoard($idx, $title, $content, $writer)
	{
		$idx = (int)$idx;
		$title = strip_tags($title);
		$content = strip_tags($content);
		$writer = strip_tags($writer);
		$sql = "UPDATE board SET title = :title, content = :content, writer = :writer where idx = :idx";
		$query = DB::getConnection()->prepare($sql);
		$query->execute(array(':idx' => $idx, ':title' => $title, ':content' => $content, ':writer' => $writer));
	}
	public function deleteBoard($idx)
	{
		$idx = (int)$idx;
		$sql = "DELETE FROM board where idx = :idx";
		$query = DB::getConnection()->prepare($sql);
		$query->execute(array(':idx' => $idx));
	}	 



}