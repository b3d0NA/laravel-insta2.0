<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" sizes="192x192" href="{{asset("favicon.png")}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield("title")</title>
</head>
<body class="bg-gray-50">
@yield("content")

@yield("script")
</body>
</html>
