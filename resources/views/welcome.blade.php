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
        .songs-list{
            width: 100%;
            background: #3c3c3b6e;
            display: flex;
            justify-content: space-between;
        }
        .songs-list p{
            margin: 5px 20px;
            text-align: center;
            font-weight:bold;
            width:10rem;
            
        }

        .songs-list audio{
            width: 80%;
            background-color: #181818;
    border: 1px solid #333;
    padding: 20px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .songimg{
            width:50%;
            height:50%;
        }
        /* Modal Popup CSS */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(255, 255, 255, 0.9);
  border-radius: 5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.modal-content {
  padding: 20px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Blurred Background CSS */
#blurred-background {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(5px); /* Adjust the blur intensity as needed */
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
                
                <button class="badge nav-item dark-badge"><i class="fa-solid fa-right-from-bracket" style="margin-right:5px;"></i><a href="logout"> Logout</a></button>
              
                <a href="wel2"><i id="user-icon" class="fa-regular fa-user"></i></a>
            </div>
        </div>
           <br>
            <h2> Trending Now near You</h2>
            <div class="cards-container">
                @foreach($albums as $album)
                <a href="{{ route('fecthed_album', $album->a_id)}}">
                    <div class="card" data-album-id="{{ $album->a_id }}" onclick="fetchSelectedSongs(this)">
                        <img src="{{  asset('album_images/' . $album->image_path) }}" class="card-img" alt="Album cover">
                        <p class="card-title"><h3>{{ $album->a_name }}</h3></p>
                        <p class="card-info">{{ $album->description }}</p>
                        <!-- Container for displaying songs -->
                        <div class="song-list"></div>
                    </div>
                </a>
                @endforeach
            </div>

            <br><hr><br> 
            <div id="songList"></div>
                {{-- <audio id="audioPlayer" controls></audio> --}}

                @foreach ($songs as $song)
                <div class="songs-list">
                    <p>{{ $song->s_name }}</p>
                    <audio controls>
                        <source src="{{ asset(''. $song->song_path) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
               @endforeach
            <div class="footer">
                <div class="line"></div>
               </div>
        </div> 
 
</body>
</html>