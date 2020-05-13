<!DOCTYPE html>
<html>
<head>
	
</head>
<body>	
	<h1>List of Tag</h1>&nbsp
	<a href="/system/tag/add">Add Tag</a>||
	<a href="/system/user/home">Back</a>| 
	<a href="/logout">Logout</a>

	<table border="1">
		<tr>
			<th>Tag ID</th>
			<th>Tag</th>
			<th>Action</th>
		</tr>
		
		@foreach($tags as $tag)
		<tr>
			<td>{{$tag->tagid}}</td>
			<td>{{$tag->hashtag}}</td>
			<td>
				<a href="{{route('user.edittag',$tag->tagid)}}">Edit</a> ||
				<a href="{{route('user.deletetag',$tag->tagid)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>