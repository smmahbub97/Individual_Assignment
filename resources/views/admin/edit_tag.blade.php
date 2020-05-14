<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>	

	<h1>Edit Tag</h1>&nbsp
	<a href="/system/admin/home">Back</a>||
	<a href="/logout">Logout</a> <br>

	<form method="post">
		{{csrf_field()}}
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" readonly name="tagid" value="{{$tags->tagid}}"></td>
			</tr>
			<tr>
				<td>Tag</td>
				<td><input type="text" name="hashtag" value="{{$tags->hashtag}}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Save"></td>
			</tr>
		</table>
	</form>
	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
</body>
</html>