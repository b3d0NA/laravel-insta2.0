@extends("layout.auth.app")
@section("title", "Register - Instagram 2.0")
@section("content")
<div class="container mx-auto px-4 py-32 flex justify-center items-center">
    <div class="left-of-register">
        <img src="{{asset('img/regi-img.png')}}" alt="">
    </div>
    <div class="regi-form bg-white w-96 border-gray-800 border-opacity-10 border-2 px-3 mx-6 py-6 p-5">
        <img src="{{asset("img/reg-top.png")}}" alt="Instagram" class="mx-auto py-6">
        <h2 class="text-gray-500 font-bold text-center px-6">Sign up to see photos and videos from your friends.</h2>
        <div class="form-section py-6">

            <form action="{{route("register")}}" method="post" class="mx-auto text-center">
                @csrf
                <div class="form-data py-2">
                    <input type="email" name="email" value="{{old("email")}}" placeholder="Email address" class="@error("email") border-red-500 border-2 @enderror w-100 bg-gray-50 p-2">
                </div>
                <div class="form-data py-2">
                    <input type="text" name="fullname" value="{{old("fullname")}}" placeholder="Full Name" class="@error("fullname") border-red-500 border-2 @enderror bg-gray-50 p-2">
                </div>
                <div class="form-data py-2">
                    @error("username")
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                    <input type="text" name="username" value="{{old("username")}}" placeholder="Username" class="@error("username") border-red-500 border-2 @enderror bg-gray-50 p-2">
                </div>
                <div class="form-data py-2">
                    <input type="password" name="password" value="{{old("password")}}" placeholder="Password" class="@error("password") border-red-500 border-2 @enderror bg-gray-50 p-2">
                </div>
                <div class="form-data py-2">
                    <input type="submit" name="submit" value="Sign up" class="cursor-pointer w-80 py-2 bg-blue-500 text-white rounded-md">
                </div>
                <p class="text-center text-gray-500 py-6 px-6">By signing up, you agree to our <span class="text-gray-600 font-bold">Terms</span>, <span class="text-gray-600 font-bold">Data Policy</span> and <span class="text-gray-600 font-bold">Cookies Policy</span> .</p>
            </form>
        </div>
        <div class="logi-form bg-gray-50 border-gray-800 border-opacity-10 border-2 py-6 p-5">
            <h2 class="text-center">Have an account? <a href="{{route("login.index")}}" class="text-blue-500">Login</a></h2>
        </div>
    </div>
</div>
@endsection
