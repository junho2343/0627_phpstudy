@extends('layout.master')

@section('content')
	<h2>게시판</h2>
	<table>
		<tr>
			<td>글번호</td><td>글제목</td><td>글쓴이</td>
		</tr>
		@foreach($list as $item)
			<tr>
				<td>{{$item->idx}}</td>
				<td>
					<a href="/board/view/{{$item->id}}">
						{{$item->title}}
					</a>
				</td>
				<td>{{ $item->writer }}</td>
			</tr>
		@endforeach


	</table>
	<a href="/board/write">글쓰기</a>
	<br>
@endsection