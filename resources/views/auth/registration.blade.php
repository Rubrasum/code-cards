@extends('layouts.app')

@section('content')

    <!--
    Inspired By
    #https://tailwindcomponents.com/component/login-page-1-light-mode
    -->
    <div class="container">
        <form method="POST" action="/signup">
            @csrf
            <section class="flex justify-center items-center h-screen">
                <div class="max-w-md w-full bg-white rounded p-6 space-y-4">
                    <div class="mb-4">
                        <p class="text-site_secondary_color text-3xl font-bold">User Registration</p>
                        <h2 class="text-xl ">Join Us! Please!</h2>
                    </div>

                    <div>
                        <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded
                            text-gray-600" type="text" placeholder="Name" id="name" name="name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded
                            text-gray-600" type="text" placeholder="email" id="email" name="email">
                    </div>
                    @error('email')
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
                        <input class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded
                            text-gray-600" type="text" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
                    </div>
                    @error('confirm_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div>
                        <button class="w-full py-4 bg-site_secondary_color hover:bg-site_secondary_color_hover rounded
                            text-sm font-bold text-gray-50 transition duration-200">Sign Up</button>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <a class="text-sm text-site_secondary_color hover:underline" href="/login">Already Have an Account?</a>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>




@endsection
