@extends('layouts.auth')

@section('content')
    <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
        <div class="flex justify-center items-center">
            <span class="text-gray-700 font-semibold text-2xl">Login</span>
        </div>

        <form class="mt-4" action="{{route('login')}}" method="post">
            @csrf
            <label class="block">
                <span class="text-gray-700 text-sm">Email</span>
                <input type="email" name="email" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600">
            </label>

            @error('email')
            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{ $message }}
            </span>
            @enderror

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Password</span>
                <input type="password" name="password" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600">
            </label>

            @error('password')
            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                {{ $message }}
            </span>
            @enderror

            <div class="mt-6">
                <button class="py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
@endsection
