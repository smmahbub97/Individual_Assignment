<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<form method="post" >
		@csrf
		Email: <input type="email" name="email" value={{$email}}> <br>
		Password: <input type="password" name="password" ><br>
		<input type="submit" name="submit" value="Submit" >
		<a href="/system/register">Register</a>
	</form>

	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
</body>
</html>