<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{URL::asset('css/style_a.css')}}">
<title>Spotify Admin Page</title>
<style>

    table {
        width: 80%;
        /* margin: 20px auto; */
        margin-left:50px;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color:  #008080;
        color: #ffffff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    tr:first-child:hover {
        background-color: #008080;
    }

    .cn {
        text-align:center;
        font-size:2rem;
        font-weight:bold;
       
    }
   
@include('header')
</style>
</head>

<body>
    <div class="content">
        <div class="cn">
            User Info
        </div>
       <div class="tbl">
       
            <table>
            <tr>
                <th> Sr No </th>
                <th> User Name </th>
                <th> Email </th>
                <th> Password </th>
                <!-- <th> Delete </th>
                <th> Edit </th> -->
            </tr>
            @foreach($data as $in)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$in['name']}}</td>
                <td>{{$in['email']}}</td>
                <td>{{$in['password']}}</td>
                <!-- <td><a href="delete/{{$in['id']}}">Delete</a></td>
                <td><a href="edit/{{$in['id']}}">Edit</a></td> -->
            </tr>
            @endforeach
            </table>
            </div>
    </div>
</body>
</html>
