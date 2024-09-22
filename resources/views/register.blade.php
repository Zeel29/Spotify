<!-- <h1>Registration</h1>
<form method="post" action="register">
	@csrf 
	<input type="text" name="user" placeholder="Enter name"><br/><br/>
	<input type="text" name="userId" placeholder="Enter email id"><br/><br/>
	<input type="password" name="password" placeholder="Enter password"><br/><br/>
	<input type="password" name="cpassword" placeholder="Enter confirm password"><br/><br/>
	<button type="submit">OK</button>
</form>
@if($errors->any())
<span style="color:red"><h4>{{$errors->first()}}</h4></span>
@endif -->


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Dancing+Script&family=Merriweather:wght@300&family=Montserrat:wght@300;400;500;600;700&family=Mulish:wght@200&family=Poppins:ital,wght@0,100;0,200;0,400;1,100&family=Quicksand:wght@300&family=Raleway:wght@300&family=Roboto+Slab:wght@300&family=Roboto:wght@300&family=Satisfy&family=Tauri&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<style>
	body{
		background-color:black;
		color: white;
	}
	form{
		font-family: "Roboto", sans-serif;
		color: white;
	}
	label {
		font-weight:bold;

	}
	.form-group{
		width:30rem;
	}
	.abc{
		color: white;
		padding:30px;
		margin:10px;
		margin-left:23rem;

	}
	.spotify{
		padding:26px;
		margin-left:23rem;
		height: 100px;
		width: 100px;
	}
	.sp{
		color: white;
		font-family: "ubuntu", sans-serif;
		font-size: 25px;
		font-weight: bold;
	}
	.login-spoti{
		color: white;
		font-family: "ubuntu", sans-serif;
		font-size: 2rem;
		font-weight:bold;
		margin-left:25rem;
	}
	.btn{
		border-color:1bd760;
		width:30rem;
		
	}
	.btn:active {
 		background-color:1bd760 ;
	}
	.aa {
		color:white;
		font-weight:bold;
		text-decoration:underline;
	}
	.aa:hover{
		text-decoration:underline;
		color:white;
	}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body style="background-color: #000000ee;">
	<div>
       <img src="{{URL::asset('css/logo.png')}}" class="spotify"> <span class="sp">Spotify</span>

	   <p class="login-spoti"> Sign Up to Spotify </p>
	</div>
		<form method="post" action="register" class="abc">
			@csrf
				<div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Name" required>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Email</label>
					<input type="email" name="userId" class="form-control" id="exampleInputPassword1" placeholder="Enter your Email" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>	

				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Confirm Password</label>
					<input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required>
				</div><br> 	

				<button style="background-color: #1bd760; color: white;" type="submit" class="btn"><b>Sign Up</b></button><br><br>
				Already have an account?
				<a href="login"  class="aa">Log in here</a>
			</form>
</body>
@if($errors->any())
<span style="color:red"><h4>{{$errors->first()}}</h4></span>
@endif