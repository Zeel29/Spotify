<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums Gallery</title>
    <style>
        /* Style for the album container */
        .album-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            background-color: #f3f3f3;
        }

        /* Style for each album card */
        .album-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect for album card */
        .album-card:hover {
            transform: translateY(-5px);
        }

        /* Style for album image */
        .album-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        /* Style for album details */
        .album-details {
            padding: 15px;
            background-color: #fff;
        }

        /* Style for album name */
        .album-name {
            font-weight: bold;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        /* Style for album description */
        .album-description {
            font-size: 14px;
            color: #666;
        }
        .song-list {
            display: none;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

        /* Style for each song in the list */
        .song-item {
            margin-bottom: 5px;
        }
      /* Style for the expanded album card */
      .expanded {
            grid-column: 1 / -1;
            z-index: 1;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Style for the expanded album details */
        .expanded-details {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 50%;
            max-height: 60%;
            overflow-y: auto;
            position: relative;
        }

        /* Style for the close button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #555;
        }

        /* Style for the song list in the expanded view */
        .expanded-song-list {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        /* Style for the album label */
        .album-label {
            font-size: 24px;
            color: #333;
            text-align: center; /* Align the label text to center */
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
    <div class="album-container">
        <!-- Loop through albums and display each one -->
        @foreach($song as $album)
            <div class="album-card" onclick="expandAlbum(this)">
                <!-- Album image -->
                <img src="{{ asset('album_images/' . $album->image_path) }}" alt="{{ $album->a_name }}" class="album-image">
                <!-- Album details -->
                <div class="album-details">
                    <!-- Album name -->
                    <div class="album-name">{{ $album->a_name }}</div>
                    <!-- Album description -->
                    <div class="album-description">{{ $album->description }}</div>
                    <!-- Other details like release date, artist, etc. can be added here -->
                </div>
                <!-- Hidden song list -->
                <div class="song-list" style="display: none;">
                    @foreach($album->songs as $song)
                        <div class="song-item">{{ $song->s_name }}</div>
                    @endforeach
                </div>
                <a class="d" href="a_delete/{{$album['a_id']}}">Delete</a>
            </div>
        @endforeach
    </div>

    <!-- Expanded album view -->
    <div class="expanded" id="expandedView" style="display: none;">
        <div class="expanded-details">
            <span class="close-btn" onclick="closeExpandedView()">&times;</span>
            
                <h2 class="album-label" id="expandedAlbumName"></h2>
            </h1>
            <div id="expandedSongList" class="expanded-song-list">
                <h1 class="album-label" style="text-align: center;">Songs:</h1> <!-- Align the "Songs" label to center -->
            </div>
        </div>
    </div>
    <div class="e">
    <a class="a" href="albums"> Add more albums </a>
    </div>
    <script>
        // Function to expand the album card and display its songs
     // Function to expand the album card and display its songs
function expandAlbum(card) {
    const albumName = card.querySelector('.album-name').textContent;
    const songList = card.querySelectorAll('.song-item'); // Select all song items

    // Clear the existing song list in the expanded view
    const expandedSongList = document.getElementById('expandedSongList');
    expandedSongList.innerHTML = ''; // Clear previous songs

    // Iterate through each song item and append it to the expanded view
    songList.forEach(function(songItem) {
        const songName = songItem.textContent;
        const songElement = document.createElement('div');
        songElement.textContent = songName;
        expandedSongList.appendChild(songElement);
    });

    document.getElementById('expandedAlbumName').textContent = albumName;
    document.getElementById('expandedView').style.display = 'flex';
}

// Function to close the expanded album view
function closeExpandedView() {
    document.getElementById('expandedView').style.display = 'none';
}


        // Function to close the expanded album view
        function closeExpandedView() {
            document.getElementById('expandedView').style.display = 'none';
        }
    </script>
</body>
</html>
