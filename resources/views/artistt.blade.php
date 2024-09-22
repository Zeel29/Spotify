 @include('header')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Song Artist</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f3f3f3;
        margin: 0;
        padding: 0;
        display: flex;
        margin-left:20rem;
        align-items:center;
        height: 100vh;
        overflow:auto;
    }
    input[type="file"] {
            width: calc(100% - 25px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin-bottom: 10px;
        }


    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 300px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    input[type="text"] {
        width: calc(100% - 25px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    button[type="submit"] {
        background-color: #1db954;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #15a246;
    }

    .e{
        margin-left:20px;
        text-decoration:none;
        background-color:#15a246;
        padding:15px;
        justify-content:center;
        text-align:center;
        border-radius:6px;
        color:white;

    }
    
    .d{
        text-decoration:none;
        background-color:#e31e1e;
        padding:10px;
        justify-content:center;
        text-align:center;
        border-radius:6px;
        color:white;
    }

    .d:hover{
        text-decoration:none;
        background-color:#d21f1f;
    }
    .e:hover{
        background-color:#15a246;
    }
    .a{
        text-decoration:none;
        color:white;
    }


</style>    
</head>
<body>  

<div class="container">
    <h1>Add Song Artist</h1>

    <form action="artistt" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="song_artist">Song Artist:</label>
            <input type="text" id="song_artist" name="artist_name" required>
        </div>

        <div class="form-group">
                <label for="album_image">Album Image:</label>
                <input type="file" id="artist_image" name="artist_image" accept="image/*" required>
        </div>
       

        <button type="submit">Submit</button>
    </form>
</div>
<div class="e">
    <a class="a" href="dis_artist"> Artists List </a>
</div>