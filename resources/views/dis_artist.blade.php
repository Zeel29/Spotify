<style> 

body {
    overflow-y: auto; /* Enable vertical scrollbar for the entire page */
}

.art-description {
    width: calc(100% - 24rem); /* Calculate width to fill remaining space */
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    margin-left: 24rem;
    margin-bottom: 20px;
    align-items: center;
    max-height: 500px;
    overflow-y: auto; /* Enable vertical scrollbar if content exceeds max height */
}


/* The rest of your CSS styles remain the same */

    table {
        width: 50%; 
        /* margin: 20px auto; */
        border-collapse: collapse;
        border-radius: 8px;
        overflow-y: hidden;
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
        margin-left:20px;
        text-decoration:none;
        background-color:#15a246;
        padding:15px;
        justify-content:center;
        text-align:center;
        border-radius:6px;
        color:white;

    }
    .e:hover{
        background-color:#15a246;
    }
    .a{
        text-decoration:none;
        color:white;
    }

</style>

@include('header')
<div class="art-description">
    <table>
        <tr>
            <th> Id </th> 
            <th> Name </th>
            <th> Image </th>
            <th> Delete </th>
            <th> Edit </th> 
        </tr>
        @isset($artistt)
            @foreach($artistt as $artist)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $artist->name }}</td>
                    <td>
                        @if($artist->art_image)
                        <img src="{{ asset('album_images/' . $artist->art_image) }}" alt="Artist Image" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td> <a class="d" href="delete/{{$artist['art_id']}}">Delete</a> </td> 
                    <td> <a class="e" href="edit/{{$artist['art_id']}}">Edit</a> </td>
                </tr>
            @endforeach
        @endif 
    </table>    
</div>