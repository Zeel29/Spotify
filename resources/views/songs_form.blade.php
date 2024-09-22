<!-- View (songs_list.blade.php) -->

@include('header')  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Multiple Songs</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    .container {
        display:flex;
        margin-left:20rem;
        place-items: center;
        height: 100vh;                
    }
    .card {
        border-radius: 10px;
        padding: 30px;
        width: 330px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    .card-header {
        background-color: #007bff;
        color: #fff;
        text-align:center;
        font-weight: bold;
        padding: 10px;
        border-radius: 2px 2px 2px 2px;
    }
    input[type="file"] {
            width: calc(100% - 25px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin-bottom: 7px;
        }

    input[type="text"], input[type="number"] {
        width: calc(100% - 21px);
        padding: 7px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    .form-group {
        margin-bottom: 12px;
    }
    label {
        color: #555;
        font-weight:bold;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        font-size: 16px;
    }
    .btn-add {
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
        padding-bottom:10px;
    }
    .btn-add:hover {
        background-color: #218838;
    }
    .btn-submit {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }
    .btn-submit:hover {
        background-color: #0056b3;
    }
    /* Dropdown styling */
    select.form-control {
        width: calc(100% - 7px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        font-size: 16px;
        appearance: none; /* Remove default arrow */
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23424242" width="24" height="24"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Custom arrow */
        background-repeat: no-repeat;
        background-position: right 10px top 50%;
        background-size: 20px auto;
        cursor: pointer;
    }
    .e{
        margin-left:20px;
        text-decoration:none;
        background-color:#007bff;
        padding:15px;
        justify-content:center;
        text-align:center;
        border-radius:6px;
        color:white;
    }
    .e:hover{
        background-color:#186ab7;
    }
    .a{
        text-decoration:none;
        color:white;
    }
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <i class="fas fa-music mr-2">  </i> Add Multiple Songs
        </div><br>
        <form action="songs_form" method="POST" enctype="multipart/form-data">
@csrf
        <div class="card-body">
            <form id="addSongsForm">
                <div class="form-group">
                    <label for="sname">Song Name</label>
                    <input type="text" class="form-control" id="sname" name="sname" required>
                </div>
                <div class="form-group">
                    <label for="artist">Artist Name</label>
                    <select name= "artist1" class="form-control">
                            @foreach($sng as $song)
                                <option value="{{$song['art_id']}}">{{$song['name']}}</option>
                            @endforeach
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="image">Song Image</label>
                    <input type="file" class="form-control-file" id="simage" name="simage" required>
                </div>
               
                <div class="form-group">
                    <label for="sfile">Song File</label>
                    <input type="file" class="form-control-file" id="file" name="sfile" accept="audio/*" required>
                </div>
                
                <div class="form-group">
                    <label for="duration">Song Duration </label>
                    <input type="number" class="form-control" id="dur" name="duration" required>
                </div>

                <div id="additionalSongs"></div>
                <button type="button" class="btn-add mb-3" onclick="addSong()">Add Another Song</button><br><br>
                <button type="submit" class="btn-submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="e">
    <a class="a" href="disp_song"> Songs List </a>
    </div>
    
</div>
<script>
    var additionalSongsAdded = false;

    function addSong() {
        if (!additionalSongsAdded) {
            var additionalSongs = document.getElementById('additionalSongs');
            var songHtml = `
                <div class="form-group">
                    <label for="sname">Song Name </label>
                    <input type="text" class="form-control" name="sname" required>
                </div>
                <div class="form-group">
                    <label for="artist">Artist</label>
                    <input type="text" class="form-control" name="artist[]" required>
                </div>
                <div class="form-group">
                    <label for="file">Song File</label>
                    <input type="file" class="form-control-file" name="file[]" required>
                </div>
            `;
            additionalSongs.innerHTML += songHtml;
            additionalSongsAdded = true;
        }
    }
</script>

</body>
</html>
