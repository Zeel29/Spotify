<!-- <h1>Login</h1>
<form method="post" action="login">
	
	@csrf 
	<input type="text" name="user" placeholder="Enter user email"><br/><br/>
	<input type="text" name="password" placeholder="Enter password"><br/><br/>
	<button type="submit">OK</button>
</form> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Dancing+Script&family=Merriweather:wght@300&family=Montserrat:wght@300;400;500;600;700&family=Mulish:wght@200&family=Poppins:ital,wght@0,100;0,200;0,400;1,100&family=Quicksand:wght@300&family=Raleway:wght@300&family=Roboto+Slab:wght@300&family=Roboto:wght@300&family=Satisfy&family=Tauri&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<style>
	body{
		background-color:black;
		color: aliceblue;
	}
	form{
		font-family: "Roboto", sans-serif;
		color: aliceblue;
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
		color: aliceblue;
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
		color:aliceblue;
		font-weight:bold;
		text-decoration:underline;
	}
	.aa:hover{
		text-decoration:underline;
		color:aliceblue;
	}
	.eror{
		margin-left:5rem;	
		font-weight:bold;
		padding:8px;
	}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body style="background-color: #000000ee;">
	<div>
       <img src="{{URL::asset('css/logo.png')}}" class="spotify"> <span class="sp">Spotify</span>

	   <p class="login-spoti"> Log in to Spotify </p>
	</div>
		<form method="post" action="login" class="abc">
			@csrf
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				</div>
				<button style="background-color: #1bd760; color: white;" type="submit" class="btn"><b>Log in</b></button><br><br>

				Don't have an account?
				<a href="register"  class="aa">Sign up for Spotify</a><br> 
				<div class="eror">
					@if($errors->any())
					<span style="color:red"><h5>{{$errors->first()}}</h5></span>
					@endif
				</div>
		</form>
<!-- 1@gmail.com
		 -->
</body>

<!-- @if($errors->any())
<span style="color:red" class="eror"><h4>{{$errors->first()}}</h4></span>
@endif -->
