@extends("layout.app")
@section("title", "Edit - Instagram 2.0")
@section("content")
    <div class="container mx-auto px-4 py-5 flex justify-center items-center">
        <div class="regi-form rounded-2xl bg-white w-96 border-gray-800 border-opacity-10 border-2 px-3 mx-6 py-6 p-5">
            <div class="form-section">
                <h2 class="text-center pb-5 font-light text-2xl border-opacity-10 border-b-2 border-gray-500">Edit profile</h2>
                @if(session("error"))
                    <div class="w-full bg-red-500 text-white p-3 rounded-md">{{session("error")}}</div>
                @endif
                <form action="{{route("user.edit", ["user" => $user])}}" method="post" class="mx-auto text-center" enctype="multipart/form-data">
                    @csrf
                    <div class="form-data py-2">
                        <img class="mx-auto w-48 rounded-full py-5" src="{{$user->profile_img}}" alt="{{$user->username}}">
                        @error("image")
                            <p class="text-red-500 py-2">{{$message}}</p>
                        @enderror
                        <input type="file" name="image" class="@error("image") border-red-500 border-2 @enderror" placeholder="Profile Image">
                    </div>
                    <div class="form-data py-2">
                        <input type="email" name="email" value="{{$user->email}}" placeholder="Email address" class="@error("email") border-red-500 border-2 @enderror w-100 bg-gray-50 p-2">
                    </div>
                    <div class="form-data py-2">
                        <input type="text" name="fullname" value="{{$user->name}}" placeholder="Full Name" class="@error("fullname") border-red-500 border-2 @enderror bg-gray-50 p-2">
                    </div>
                    <div class="form-data py-2">
                        @error("username")
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                        <input type="text" name="username" value="{{$user->username}}" placeholder="Username" class="@error("username") border-red-500 border-2 @enderror bg-gray-50 p-2">
                    </div>
                    <div class="form-data py-2">
                        <textarea name="bio" placeholder="Type your bio...." class="@error("bio") border-red-500 border-2 @enderror bg-gray-50 p-5">{{$user->bio}}</textarea>
                    </div>
                    <div class="form-data py-2">
                        <input type="submit" name="submit" value="Update" class="cursor-pointer w-80 py-2 bg-blue-500 text-white rounded-md">
                    </div>
                </form>
            </div>
        </div>
@endsection
