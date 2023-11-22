<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hamsha Village</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/7051/7051872.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;700&family=Montserrat:wght@400;700&family=Poppins:wght@400;700&display=swap');
        body{
        margin:0;
        padding: 0;
        font-family: 'Poppins',sans-serif;
        box-sizing: border-box;
        }
    </style>
    @vite('resources/js/app.js')
</head>
<body>
    <div id="app">
        <router-view> </router-view>
    </div>
</body>
</html>
