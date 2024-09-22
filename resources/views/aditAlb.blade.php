@include('header')
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album - Spotify Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            /* font-family: 'Montserrat', sans-serif; */
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            margin-left:20rem;
            align-items:center; /* Adjusted to align descriptions to the top */
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 360px;
            margin-right: 20px; /* Adjusted to add space between form and descriptions */
        }

        .album-description {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px; /* Added margin to separate form from the title */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin-bottom: 10px;
        }

        input[type="file"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin-bottom: 10px;
        }

        .add-song-btn {
            width: 40px;
            height: 40px;
            background-color: #1db954;
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
            transition: background-color 0.3s ease;
        }

        .add-song-btn:hover {
            background-color: #15a246;
        }

        .song-inputs {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
        }

        .song-input {
            position: relative;
        }

        .remove-song-btn {
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            height: 30px;
            background-color: #ff5555;
            color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            line-height: 1;
            transition: background-color 0.3s ease;
            display: none;
        }

        .remove-song-btn:hover {
            background-color: #ff0000;
        }

        .song-input:hover .remove-song-btn {
            display: block;
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
            width: 95%;
        }

        button[type="submit"]:hover {
            background-color: #15a246;
        }
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
    </style>
</head>
<body>
<div class="container">
        <h1>Add New Album</h1>

        <form action="/editAlb" method="get" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="album_name">Album Name:</label>
                <input type="text" id="album_name" name="album_name" required>
            </div>

            <div class="form-group">
                <label for="album_image">Album Image:</label>
                <input type="file" id="album_image" name="album_image" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="album_desc">Album Description:</label>
                <input type="text" id="album_desc" name="desc" required>
            </div>

            <div class="form-group">
            <label>Songs:</label>
            <div class="song-inputs">
                <select name="songs[]" class="form-control">
                    @foreach($song as $songg)
                        <option value="{{ $songg->s_id }}">{{ $songg->s_name }}</option>
                    @endforeach
                </select>

            </div>

                <button type="button" class="add-song-btn" onclick="addSong()">+</button>
            </div>

            <button type="submit">Save Album</button>
        </form>
    </div>
<script>
        function addSong() {
            const songInputs = document.querySelector('.song-inputs');
            const newSongInput = document.createElement('div');
            newSongInput.classList.add('song-input');
            newSongInput.innerHTML = `
                <select name="album_songs" class="form-control" >
                    @foreach($song as $songg)
                        <option value="{{ $songg->s_id }}">{{ $songg->s_name }}</option>
                    @endforeach
                </select>
                <button type="button" class="remove-song-btn" onclick="removeSong(this)">-</button>
            `;
            songInputs.appendChild(newSongInput);
        }

        function removeSong(button) {
            const songInput = button.parentElement;
            songInput.remove();
        }
    </script>
</body>
</html>
