<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Edit User</h2>
    <form action="/l_edit" method="get" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="txtid" value="{{$login['id']}}"><br><br>
        <label for="username">Username:</label>

        <input type="text" id="username" name="username" value="{{$login['name']}}" placeholder="Enter username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$login['email']}}" placeholder="Enter email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"  placeholder="Enter password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="cpassword" placeholder="Confirm password" required>

        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
