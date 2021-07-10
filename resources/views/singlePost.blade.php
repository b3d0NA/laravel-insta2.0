@extends("layout.app")
@section("title", "Instagram 2.0")
@section("content")
    <div class="container mx-auto lg:px-32 p-10">
        @if($post->count())
            <div class="post-wrapper lg:mx-auto flex justify-center pt-3">
                <div class="box-border h-auto md:w-10/12 sm:w-screen lg:w-6/12 p-4 border-2 border-opacity-30 rounded-md">
                    <div class="post-top pb-5">
                        <img class="float-left mr-3 w-12 rounded-full" src="{{$post->user->profile_img}}" alt="Username">
                        <span class="font-medium text-gray-800 pt-1 pb-0 mb-0">{{$post->user->name}}</span>
                        <p class="text-gray-400 pt-0.5 text-sm mt-0">{{$post->user->username}}</p>
                    </div>
                    <div class="post-img">
                        <img src="{{asset("storage/post/$post->image")}}" class="object-fill w-full h-auto rounded-md" alt="Post">
                    </div>
                    <form action="{{route("like.store", ["post" => $post])}}" method="post">
                        @csrf
                        <div class="like-section flex justify-center items-center py-5">
                            <div class="love-react cursor-pointer">
                                <button type="submit">
                                    @if($post->likedBy(auth()->user()))
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#f00" width="24" height="24">
                                            <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#000" width="24" height="24">
                                            <path d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/>
                                        </svg>
                                    @endif
                                </button>
                            </div>
                            <span class="text-center ml-3">{{$post->likes->count()}} {{Str::plural("like", $post->likes->count())}}</span>
                        </div>
                    </form>
                    <div class="post-text">
                        <p class="text-gray-600">{{$post->body}}</p>
                    </div>
                    <div class="post-time py-3">
                        <p class="text-gray-400 font-light">{{$post->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="post-wrapper mx-auto flex justify-center pt-3">
                <div class="box-border h-auto w-6/12 p-4 border-2 border-opacity-30 rounded-md">

                    <h1 class="text-3xl text-center text-gray-600 py-9">There is no post at this link.</h1>
                </div>
            </div>

        @endif
    </div>
@endsection
