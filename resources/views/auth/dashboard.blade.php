@extends('layouts.app')

@section('content')

    <!--
    Inspired By
    #https://tailwindcomponents.com/component/login-page-1-light-mode
    -->
    <div class="container ">
        <section class="grid items-center grid-cols-1 gap-4 flex justify-center w-100">
            <div  class="row-span-1 text-center">
                <h1>Dashboard</h1>
            </div>
            <div class="row-span-2 grid-cols-1 w-full bg-white rounded p-6 space-y-2 grid gap-4">
                <div class="mb-4 row-span-1">
                    <p class="text-site_secondary_color text-3xl font-bold">You are Logged In</p>
                </div>

            </div>
        </section>
    </div>




@endsection
