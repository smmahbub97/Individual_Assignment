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
			<th>Category ID</th>
			<th>Category Name</th>
			<th>Tag</th>
			<th>Action</th>
		</tr>
		
		@foreach($categories as $category)
		<tr>
			<td>{{$category->catid}}</td>
			<td>{{$category->catname}}</td>
			<td>{{$category->tag}}</td>
			<td>
				<a href="{{route('admin.editcategory',$category->catid)}}">Edit</a> ||
				<a href="{{route('admin.deletecategory',$category->catid)}}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>