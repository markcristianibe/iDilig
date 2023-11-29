<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <title>No Result Found</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        h2, h3, h5 {
            margin-top: 20px;
            font-family: 'Gabarito', cursive;
            color: #555;
        }
        button{
            padding: 10px 20px;
            font-family: 'Gabarito', cursive;
            border: none;
            color: #d9ead3;
            font-size: large;
            background-color: #38761d;
            margin-top: 70px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <img src="{{ asset('img/withered-plant.jpg') }}" width="100%">
    <br>
    <center>
        <h2>{{ $title }}</h2>
        <h3>{{ $content }}</h3>
        <br>
        <h5>{{ $note }}</h5>
        <button id="retryButton" type="button" onclick="window.location.href = '{{ $redirect }}'">{{ $action }}</button>
    </center>
</body>
</html>