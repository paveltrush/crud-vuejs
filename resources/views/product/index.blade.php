@extends('layouts.admin')

@section('content')

    <div class="mt-8">
        <div class="flex justify-between">
            <h3 class="text-gray-700 text-3xl font-medium">Products list</h3>

            <div class="flex rounded-md">
                <form action="{{route('products-export')}}" method="post">
                    @csrf
                    <a href="{{url('/products-create')}}" class="button px-6 py-3 bg-green-400 rounded-md text-white font-medium tracking-wide hover:bg-gray-400">Create</a>

                    <button class="button px-6 py-3 bg-blue-400 rounded-md text-white font-medium tracking-wide hover:bg-gray-400 ml-3">Export</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="mt-6">
            <div class="bg-white shadow rounded-md overflow-hidden my-6">
                <table class="text-left w-full border-collapse">
                    <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Title</th>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Description</th>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Price($)</th>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        /** @var \App\Models\Product $product */
                    @endphp
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b text-gray-700 text-lg">{{$product->title}}</td>
                            <td class="py-4 px-6 border-b text-gray-500">{{$product->description}}</td>
                            <td class="py-4 px-6 border-b text-gray-500">{{$product->price}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="{{route('product-edit', $product->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
