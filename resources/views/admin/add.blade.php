<!DOCTYPE html>
<html>
<head>
	<title>Add Page</title>
</head>
<body>

	<h1>Add Tag</h1>&nbsp
	<a href="/system/admin/home">Back</a>
	<form method="post" >
		@csrf
		Tag: <input type="text" name="tag" > <br>
		<input type="submit" name="submit" value="Submit" >
	</form>

	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
</body>
</html>