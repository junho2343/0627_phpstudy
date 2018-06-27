<div class="container">
	<h2>여기는 게시판 목록 페이지(board/index)입니다.</h2>
	<p>이 페이지는 http://localhost/board 또는 http://localhost/board/index 로 접근할 수 있습니다.</p>
	<ul class="board-list">
		<?php foreach($board_list as $val): ?>
			<li>
				<a href="/board/view/<?=$val->idx?>"><?=$val->idx?>/<?=$val->title?>/<?=$val->writer?> (<?=$val->wdate?>)</a>
				<a href="/board/view/<?=$val->idx?>"> 수정</a>
				<a href="/board/view/<?=$val->idx?>"> 삭제</a>
			</li>
		
		<?php endforeach; ?>
	</ul>
	<button onclick="location.href='/board/write'">글쓰기</button>
</div>
<?php 
	if(isset($_SESSION['msg'])){
		print $_SESSION['msg']."떳따";
		unset($_SESSION['msg']);
	}
 ?>