<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{URL::asset('css/logo.png')}}">
    <title>Spotify - Web Player: Music for everyone</title>
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@100;200;400&family=Raleway:wght@300&family=Roboto:wght@300&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
<style> 
    .album-container {
    margin: 20px;
    padding: 20px;
    background-color: #333;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: #fff;
}

.album-header {
    display: flex;
    align-items: center;
    
}

.album-art {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-right: 20px;
}

.album-details {
    flex-grow: 1;
}

.album-details p {
    margin: 5px 0;
}

.songs-list {
    margin-top: 20px;
}

.song-item {
    margin-bottom: 10px;
}

.song-name {
    margin: 5px 0;
}
audio {
    width: 100%;
    background-color: #222;
    border: none;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    color: #fff; /* Text color */
    position: relative;
    overflow: hidden;
}

audio::-webkit-media-controls-panel {
    background-color: #fff; /* Semi-transparent background for controls */
    border-radius: 5px;
    padding: 5px; /* Adjust padding as needed */
}




/* Custom play button */
.audio-play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
   /* Ensure play button is above controls */
}



.audio-play-button:hover {
    background-color: #1ed760; /* Hover color */
}

</style>
</head> 
<body>
    <div class="main">
        <div class="sidebar">
            <div class="nav"> 
                <div class="nav-option" style="opacity: 1;">
                   <i class="fa-solid fa-house"></i>
                   <a href="#">Home </a>
                </div>
                <div class="nav-option">
                   <i class="fa-solid fa-magnifying-glass"></i>
                   <a href="#">Search </a>
                </div>
            </div>
            <div class="library">  
               <div class="options">
                   <div class="lib-options nav-option">
                    <img src="{{URL::asset('css/library_icon.png')}}">
                     <a href="#">Your Library</a>
                   </div>
                   <div class="icons">
                    <i class="fa-solid fa-plus"></i>
                    <i class="fa-solid fa-arrow-right"></i>
                   </div>
               </div>    
               <div class="lib-box">
                   <div class="box">
                       <p class="box-p1"> Create Your First Playlist </p>
                       <p class="box-p2"> It's easy we'll help you!</p>
                       <button class="badge">Create Playlist  </button>
                   </div>
                   <div class="box">
                    <p class="box-p1">Let's Find some Podcasts to Follow  </p>
                    <p class="box-p2"> We'll keep you up!</p>
                    <button class="badge">Browse Podcasts  </button>
                </div>
               </div>
            </div>    
        </div>
      <div class="main-content">  
        <div class="sticky-nav">
            <div class="sticky-nav-icons">
                <button><img src="{{URL::asset('css/backward_icon.png')}}" class="padding"> </button>
                <button><img src="{{URL::asset('css/forward_icon.png')}}" class="hide"  class="padding"></button>
            </div>
            <div class="sticky-nav-options">
                <!-- <button class="badge nav-item hide">Explore Premium  </button> -->
                <button class="badge nav-item dark-badge"><i class="fa-solid fa-right-from-bracket" style="margin-right:5px;"></i><a href="logout"> Logout</a></button>
                <i class="fa-regular fa-user"></i>
            </div>
        </div>

        <div class="album-container">
            <div class="album-header">
            <h2> Album: </h2> 
                    <img src="{{ asset('album_images/' . $album->image_path) }}" alt="Album Art" class="album-art">
                    <div class="album-details">
                      
                        <p> Song Name : {{ $album->a_name }}</p>
                        <p> Description : {{ $album->description }}</p>

                    </div>
                </div>
                <div class="songs-list">
                    @foreach($album->songs as $song)
                    <div class="song-item">
                        <!-- <p class="song-title"> Title : {{ $song->description }}</p> -->
                        <p class="song-name"> Song Name : {{$song->s_name}}</p>
                        <audio controls>
                        <source src="{{ asset(''. $song->song_path) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    </div>
                    @endforeach
                 </div>
                </div>
    </div>

    <script>
    function fetchSelectedSongs(card) {
        // Get the album ID from data attribute
        const albumId = card.dataset.albumId;

        // Make an AJAX request to fetch the selected songs for the album
        fetch('/albumss/${albumId}/songs')
            .then(response => response.json())
            .then(data => {
                // Get the song list container within the current card
                const songListContainer = card.querySelector('.song-list');

                // Clear previous song list content
                songListContainer.innerHTML = '';

                // Loop through each song and add it to the song list container
                data.songs.forEach(function(song) {
                    const songItem = document.createElement('p');
                    songItem.textContent = song.s_name;
                    songListContainer.appendChild(songItem);
                });
            })
            .catch(error => {
                console.error('Error fetching songs:', error);
            });
    }
</script>

</body>
</html>