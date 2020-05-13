<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>	

	<h1>User Details</h1>&nbsp
	<a href="/logout">Logout</a> <br>

		<table>
			<tr>
				<td>Id</td>
				<td>{{$catid}}</td>
			</tr>
			<tr>
				<td>Category Name</td>
				<td>{{$catname}}</td>
			</tr>
			<tr>
				<td>Tag</td>
				<td>{{$tag}}</td>
			</tr>
			
		</table>
		<h2>Are you sure? This can't be undone!</h2>
		<form method="post">
			{{csrf_field()}}
			<input type="hidden" name="catid" value="{{$catid}}">
			<input type="submit" name="submit" value="Confirm">
		</form>
</body>
</html>