@extends('layouts.admin')

@section('content')
    @php
        /** @var \App\Models\Product $product */
    @endphp

    <div class="mt-8">
        <div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
            <form action="{{route('product-store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="px-5 py-3 text-gray-700 border-b">
                    <h3 class="text-md">Add Product</h3>
                </div>

                <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                    <div>
                        <label class="text-sm">Title</label>

                        <input type="text" name="title" value="{{old('title')}}"
                               class="form-input w-full border rounded-md focus:border-indigo-600 focus:outline-none my-2 px-4 py-2 @error('price') border-red-500 @enderror">

                        @error('title')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm">Price</label>

                        <input type="number" step="0.01" name="price" value="{{old('price')}}" class="my-2 form-input w-full px-4 py-2 border rounded-md focus:border-indigo-600 @error('price') border-red-500 @enderror">

                        @error('price')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-sm">Description</label>

                        <textarea name="description" class="my-2 form-input w-full px-4 py-2 border rounded-md focus:border-indigo-600 @error('description') border-red-500 @enderror">
                            {{old('description')}}
                        </textarea>

                        @error('description')
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="flex justify-between items-center px-5 py-3">
                    <a href="{{url('/products')}}" class="button px-3 py-1 text-gray-700 text-md rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Back</a>
                    <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-md hover:bg-indigo-500 focus:outline-none">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
