<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Code Challenge</title>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: sans-serif;
            height: 100vh;
            margin: 50px;
        }

        .full-height {
            height: 100vh;
        }

        .result {
        }
    </style>
</head>
<body>
<div class="full-height">
	        Your Search Term Was: <b>{{$searchTerm}}</b>
    <div class="result">

         @if(isset($data))
            @if(count($data['albums']['items']) > 0)
            <div  style=" width:35%;float:left;border:1px solid #000000; padding-right:5px;margin-right: 5px;">
                <h2>Album</h2>
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th class="text-center">Title</th>   
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['albums']['items'] as $albums)
                            
                        <tr>
                            <td class="text-center"><img src="{{isset($albums['images'][0]) ? $albums['images'][0]['url'] : ''}}" width="100" /></td>
                            <td class="text-center">{{$albums['name']}}</td>
                            <td class="text-center"><a href="/detail/albums/{{ $albums['id'] }}">Detail</a></td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @if(count($data['tracks']['items']) > 0)
            
            <div style="width:35%;float:left;border:1px solid #000000;padding-right:5px;margin-right: 5px;">
                <h2>Tracks</h2>
                <table width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Track</th>
                            <th class="text-center">Title</th>  
                            <th class="text-center">Action</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['tracks']['items'] as $value)
                           
                        <tr>
                            <td class="text-center">
                                <audio controls style="vertical-align: middle" src="{{$value['preview_url']}}" type="audio/mp3" controlslist="nodownload">
                                    Your browser does not support the audio element.
                                </audio>
                            </td>
                            <td class="text-center">{{$value['name']}}</td>
                            <td class="text-center"><a href="/detail/tracks/{{ $value['id'] }}">Detail</a></td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @if(count($data['artists']['items']) > 0)
            
           <div style="width:25%;float:left;border:1px solid #000000">
                <h2>Artists</h2>
                <table width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Title</th>    
                            <th class="text-center">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['artists']['items'] as $value)
                           
                        <tr>
                            <td class="text-center"><img src="{{isset($value['images'][0]) ? $value['images'][0]['url'] : ''}}" width="100" /></td>
                            <td class="text-center">{{$value['name']}}</td>
                            <td class="text-center"><a href="/detail/artists/{{ $value['id'] }}">Detail</a></td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        @endif
    </div>
</div>
</body>
</html>
