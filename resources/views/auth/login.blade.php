@extends("layout.auth.app")
@section("title", "Login - Instagram 2.0")
@section("content")
    <div class="container mx-auto px-4 py-32 flex justify-center items-center">
        <div class="left-of-register">
            <img src="{{asset('img/regi-img.png')}}" alt="">
        </div>
        <div class="regi-form bg-white w-96 border-gray-800 border-opacity-10 border-2 px-3 mx-6 py-6 p-5">
            <img src="{{asset("img/reg-top.png")}}" alt="Instagram" class="mx-auto py-2">
            <div class="form-section py-6">
                @if(session("status"))
                    <div class="text-center text-red-500">
                        {{session("status")}}
                    </div>
                @endif
                <form action="{{route("login.auth")}}" method="post" class="mx-auto text-center">
                    @csrf
                    <div class="form-data py-2">
                        <input type="email" name="email" value="{{old("email")}}" placeholder="Email address" class="@error("email") border-red-500 border-2 @enderror w-100 bg-gray-50 p-2">
                    </div>
                    <div class="form-data py-2">
                        <input type="password" name="password" value="{{old("password")}}" placeholder="Password" class="@error("password") border-red-500 border-2 @enderror bg-gray-50 p-2">
                    </div>
                    <div class="form-data py-2 text-left px-5">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="form-data py-2">
                        <input type="submit" name="submit" value="Log In" class="cursor-pointer w-80 py-2 bg-blue-500 text-white rounded-md">
                    </div>
                </form>
            </div>
            <div class="logi-form bg-gray-50 border-gray-800 border-opacity-10 border-2 py-6 p-5">
                <h2 class="text-center">Don't have an account? <a href="{{route("register.index")}}" class="text-blue-500">Sign up</a></h2>
            </div>
        </div>
    </div>
@endsection
