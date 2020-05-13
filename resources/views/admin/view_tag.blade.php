<!DOCTYPE html>
<html>
<head>
	
</head>
<body>	
	 | 
	<a href="/system/admin/home">Back</a>| 
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
				<a href="{{route('admin.edittag',$tag->tagid)}}">Edit</a> ||
				<a href="{{route('admin.deletetag',$tag->tagid)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>