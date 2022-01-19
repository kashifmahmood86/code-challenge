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
    <div class="result">
        
        @if(isset($details))
            <div>
                <h2>Detail</h2>
                <ul>
                        @foreach ($details as $key => $item)
                        <li>{{ucwords(implode(' ', explode('_',$key)))}} : {{!is_array($item) ? $item : ''}}</li>
                        @endforeach
                </ul>
            </div>
        @endif
        
        
        <div><a href="/home">Back to Search Page</a></div>
    </body>
</html>
