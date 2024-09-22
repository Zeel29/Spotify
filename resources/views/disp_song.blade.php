<!-- disp_song.blade.php -->

<!-- @include('header')   -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Song List</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    .container {
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #007bff;
        color: #fff;
    }
    /* .audio-player {
        width: 100%;
    } */
    .controls {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 26px;
    }
    .controls button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: #333;
        font-size: 20px;
        /* margin: 0 10px; */
    }
    .controls button:hover {
        color: #55acee;
    }
    .small-text {
        font-size: 14px;
    }
    audio {
        width:30rem;

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
    <table>
        <thead>
            <tr>
                <th> Id </th>
                <th>Song Name</th>
                <th>Artist</th>
                <th>Audio</th>
                <th>Controls</th>
                <th> Delete </th> 
                <th> Edit </th> 

            </tr>
        </thead>
        <tbody>
            @foreach($sng as $song)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td class="small-text">{{ $song->s_name }}</td>
                <td class="small-text">{{ $song['name'] }}</td>
                <td><audio class="audio-player" id="audioPlayer_{{ $song->s_id }}" src="{{ asset('storage/' . $song->song_path) }}" controls></audio></td>
                <td class="controls">
                    <button onclick="playAudio('{{ $song->s_id }}')"><i class="fas fa-play"></i></button>
                    <button onclick="pauseAudio('{{ $song->s_id }}')"><i class="fas fa-pause"></i></button>
                </td>
                <td> <a class="d" href="s_delete/{{$song['s_id']}}">Delete</a> </td> 
                <td> <a class="e" href="edit/{{$song['s_id']}}">Edit</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="e" href="songs_form"> Add more songs </a>
</div>

<script>
    function playAudio(songId) {
        var audioPlayer = document.getElementById('audioPlayer_' + songId);
        audioPlayer.play();
    }

    function pauseAudio(songId) {
        var audioPlayer = document.getElementById('audioPlayer_' + songId);
        audioPlayer.pause();
    }
</script>

</body>
</html>
