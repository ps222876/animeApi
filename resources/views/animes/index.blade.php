<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($animes as $anime)
        <img style="height: 100px" src="{{ $anime->image_url }}" alt="" srcset="">
    @endforeach

</body>

</html>
