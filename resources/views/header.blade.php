<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{URL::asset('css/styles_admin.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@100;200;400&family=Raleway:wght@300&family=Roboto:wght@300&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>Spotify Admin Page</title>
<link rel="stylesheet" href="styles.css">
<style>

.sticky-nav-icons button{
    margin-right: 0.4rem;
    margin-top: 0.6rem;
    padding :0.5rem;
    border-radius: 100%;  
    background-color: #000000B3;
    border-color: transparent
}
.sticky-nav-options{
    display: flex;
    justify-content: center;
    align-items: center;

}
.sticky-nav-options button{
    margin-right: 1rem;
}
@media (max-width:1000px){
    .hide{
        display:none;
    }
}
    
</style>

</head>
<body>
    <div class="sidebar">
        <div class="h22">
            <img src="{{URL::asset('css/logo.png')}}" class="spotify"> 
            <div class="sp"> Spotify </div>
        </div>
        
        <ul> 
            <li><a href="admin">Dashboard</a></li>
            <li><a href="user_info">Users</a></li>
            <li><a href="artistt">Artists</a></li>
            <li><a href="albums">Albums</a></li>
            <li><a href="songs_form">Songs</a></li>
        
        </ul>
        <div class="sticky-nav-options">
                <!-- <button class="badge nav-item hide">Explore Premium  </button> -->
                <button class="badge nav-item dark-badge"><i class="fa-solid fa-right-from-bracket" style="margin-right:5px;"></i><a href="logout"> Logout</a></button>
                <i class="fa-regular fa-user"></i>
            </div>
       
    </div>
    
    <!-- <div class="content">
        <div class="wel">
            Welcome to Spotify Admin Panel!
        </div> -->
    </div>
</body>
</html>
