@extends('layouts.app')

@section('content')

    <!--
    Inspired By
    #https://tailwindcomponents.com/component/login-page-1-light-mode
    -->
    <div class="container ">
        <form method="POST" action="/login">
            @csrf
            <section class="flex justify-center items-center h-screen">
                <div class="max-w-md w-full bg-white rounded p-6 space-y-4">
                    <div class="mb-4">
                        <p class="text-site_secondary_color text-3xl font-bold">Sign In</p>
                        <h2 class="text-xl ">Good to see you again!</h2>
                    </div>

                    <div>
                        <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded
                            text-gray-600" type="text" placeholder="Username" id="username" name="username">
                    </div>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded
                            text-gray-600" type="text" placeholder="Password" id="password" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <button class="w-full py-4 bg-site_secondary_color hover:bg-site_secondary_color_hover rounded
                            text-sm font-bold text-gray-50 transition duration-200">Sign In</button>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex flex-row items-center">
                            <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300
                                rounded">
                            <label for="comments" class="ml-2 text-sm font-normal text-gray-600">Remember me</label>
                        </div>

                        <div>
                            <a class="text-sm text-site_secondary_color hover:underline" href="#">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>




@endsection
