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

    .art-description {
        width:26.3rem;
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        margin-left:4rem;
        margin-bottom: 20px;
        align-items:center;
    }
    table {
        width: 50%; 
        /* margin: 20px auto; */
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 5px 5px 20px rgba(0, 0, 0 , 0.2);
    }
    th, td {
        /* padding-top:10px; */
        padding: 20px 15px;
        text-align: center;
    }
    /* tr{
        width: 10rem;
    } */
    th {
        background-color:  #008080;
        color: #ffffff;
    }
    /* tr:nth-child(even) {
        background-color: #f2f2f2;
    } */

    tr:hover {
        background-color: #ddd;
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

    .e{
        text-decoration:none;
        background-color:#1f7cd2;
        padding:10px;
        justify-content:center;
        text-align:center;
        border-radius:6px;
        color:white;
    }
    .e:hover{
        background-color:#186ab7;
    }

</style>    
</head>
<body>  

<div class="container">
    <h1>Add Song Artist</h1>

    <form action="/edit" method="get" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="hidden" name="txtid" value="{{$newartist['art_id']}}"><br><br>
        <label for="song_artist">Song Artist:</label>
        <input type="text" id="song_artist" value="{{$newartist['name']}}" name="artist_name" required>
    </div>

    <div class="form-group">
        <label for="album_image">Album Image:</label>
        <div class="custom-file-upload">
            <input type="file" id="artist_image" name="artist_image" value="{{ $newartist['art_image'] ?? 'No file chosen' }}</" accept="image/*" onchange="updateFileNameDisplay(this)">
            <!-- <span id="selected-image"> {{ $newartist['art_image'] ?? 'No file chosen' }}</span> -->
        </div>
    </div>

    <button type="submit">Submit</button>
</form>

<script>
    // Function to update the filename display when a file is selected
    function updateFileNameDisplay(input) {
        if (input.files.length > 0) {
            document.getElementById('selected-image').innerText = input.files[0].name;
        } else {
            document.getElementById('selected-image').innerText = 'No file chosen';
        }
    }
</script>
