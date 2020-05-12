<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<form method="post" >
		@csrf
		Name: <input type="text" name="name" > <br>
		Email: <input type="email" name="email" > <br>
		Password: <input type="password" name="password" ><br>
		Repeat Password: <input type="password" name="password_confirmation" > <br>
		Role: <input type="text" name="role" > <br>
		<input type="submit" name="submit" value="Submit" >
		<a href="/system/supportstaff/login">Back</a>

	</form>

	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
</body>
</html>