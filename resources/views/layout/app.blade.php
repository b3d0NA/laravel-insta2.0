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
<header class="mx-auto py-2 bg-white border-b-2 border-gray-400 border-opacity-20">
    <div class="header-wrapper w-8/12 flex justify-between items-center mx-auto">
        <div class="img">
            <a href="{{route("home")}}">
            <img class="w-28" src="{{asset("img/reg-top.png")}}" alt="Instagram">
            </a>
        </div>
        <div class="cursor-pointer flex">
            <a href="{{route("user.profile", ["user" => auth()->user()])}}">
                <img src="{{auth()->user()->profile_img}}" alt="" class="w-10 border-2 border-red-500 rounded-full hover:border-black ease-linear transition">
            </a>
            <form action="{{route("logout")}}" method="post" class="px-4 pt-2">
                @csrf
                <button type="submit" title="Logout">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#484848" width="20" height="20">
                        <path d="M400 54.1c63 45 104 118.6 104 201.9 0 136.8-110.8 247.7-247.5 248C120 504.3 8.2 393 8 256.4 7.9 173.1 48.9 99.3 111.8 54.2c11.7-8.3 28-4.8 35 7.7L162.6 90c5.9 10.5 3.1 23.8-6.6 31-41.5 30.8-68 79.6-68 134.9-.1 92.3 74.5 168.1 168 168.1 91.6 0 168.6-74.2 168-169.1-.3-51.8-24.7-101.8-68.1-134-9.7-7.2-12.4-20.5-6.5-30.9l15.8-28.1c7-12.4 23.2-16.1 34.8-7.8zM296 264V24c0-13.3-10.7-24-24-24h-32c-13.3 0-24 10.7-24 24v240c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24z"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>

</header>
@yield("content")

@yield("script")
</body>
</html>
