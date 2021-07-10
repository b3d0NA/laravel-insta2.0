@extends("layout.app")
@section("title", $user->name." - Instagram 2.0")
@section("content")
    <div class="container mx-auto lg:px-32">
        <div class="user-profile flex flex-col pt-3">
            <div class="top-user flex justify-start lg:pl-40 border-opacity-10 border-b-2 border-gray-400">
                <div class="profile-image p-5">
                    <img src="{{$user->profile_img}}" class="w-56 rounded-full" alt="{{$user->username}}">
                </div>
                <div class="profile-desc lg:ml-20 pt-12">
                    <div class="profile-username">
                        <h2 class="text-black font-light text-3xl">{{$user->username}}</h2>
                    </div>
                    <div class="profile-info py-3 flex">
                        <p class="font-medium text-gray-500 p-2"><span class=" text-black">{{$user->post()->count()}}</span>
                            {{Str::plural("post", $user->post()->count())}}</p>
                        <p class="font-medium text-gray-500 p-2"><span class=" text-black">{{$user->likes()->count()}}</span>
                            {{Str::plural("like", $user->likes()->count())}}</p>
                    </div>
                    <div class="profile-name">
                        <span class="font-bold text-black text-xl">{{$user->name}}</span>

                    </div>
                    <div class="profile-bio">
                        <p>{{$user->bio}}</p>
                        @if($user->id === auth()->user()->id)
                            <a href="{{route("user.edit.index", ["user" => $user])}}" class="p-2 block border-2 hover:bg-gray-200 border-opacity-10 rounded-lg border-gray-800 bg-white text-center my-3">Edit Profile</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bottom-user p-5">
                <div class="user-posts py-10 grid lg:grid-cols-4 grid-cols-1 grid-flow-col-dense justify-items-center gap-4">
                    @if($user->post()->latest()->get()->count())
                        @foreach($user->post()->latest()->get() as $post)
                            <div class="post">
                                <a href="{{route("post.single", ["post" => $post])}}">
                                    <img class="w-80 rounded-sm" src="{{asset("storage/post/$post->image")}}" alt="">
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="post">
                            <h2 class="text-center text-2xl">There is no posts for this user.</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
