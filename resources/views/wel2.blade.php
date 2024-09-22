<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{URL::asset('css/logo.png')}}">
    <title>User Profile</title>
    <link rel="stylesheet" href="path/to/modal-style.css">
    <style>
/* Main profile wrapper */
body{
    padding:0;
    margin:0;
}
.main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color:  #00000062;
}

/* Profile card */
.profile-wrapper {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    max-width: 400px;
    width: 90%;
}

.profile-info {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.profile-info img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-right: 20px;
}

.text-info {
    text-align: left;
}

.name {
    font-size: 1rem;
   
    margin-bottom: 5px;
}

.email {
    font-size: 1rem;
   
    color: #666;
    margin-bottom: 5px;
}

.description {
    color: #777;
    margin-bottom: 20px;
}

/* Edit profile button */
#edit-profile-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration:none;
}

#edit-profile-btn:hover {
    background-color: #0056b3;
}
#delete-profile-btn{
        text-decoration:none;
        background-color:#e31e1e;
        padding:10px;
        justify-content:center;
        text-align:center;
        border-radius:6px;
        color:white;
        border:none;
    }

    #delete-profile-bt:hover{
        text-decoration:none;
        background-color:#d21f1f;
    }

        </style>
</head>
<body>
    <div class="main">
        <div class="profile-wrapper">
            <h1>User Profile</h1>
            <div class="profile-info">
                <div class="text-info">
                    <p class="name"> User Name : {{ $login->name }}</p>
                    <p class="email">User Email : {{ $login->email }}</p>
                    <p class="description"> {{ $login->description }}</p>
                </div>
            </div>
            <a id="edit-profile-btn" href="l_edit/{{$login['id']}}">Edit Profile</a>
            <a id="delete-profile-btn" href="l_delete/{{$login['id']}}">Delete Profile</a>
        </div>
        <div id="blurred-background"></div>
    </div>
    <script>
        // JavaScript code for modal interactions (unchanged)
    </script>
</body>
</html>
