@extends('layouts.admin')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Tables</h3>

    <div class="mt-8">
        <h4 class="text-gray-600">Simple Table</h4>

        <div class="mt-6">
            <div class="bg-white shadow rounded-md overflow-hidden my-6">
                <table class="text-left w-full border-collapse">
                    <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">City</th>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Total orders</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-gray-200">
                        <td class="py-4 px-6 border-b text-gray-700 text-lg">New York</td>
                        <td class="py-4 px-6 border-b text-gray-500">200,120</td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="py-4 px-6 border-b text-gray-700 text-lg">Manchester</td>
                        <td class="py-4 px-6 border-b text-gray-500">632,310</td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="py-4 px-6 border-b text-gray-700 text-lg">London</td>
                        <td class="py-4 px-6 border-b text-gray-500">451,110</td>
                    </tr>
                    <tr class="hover:bg-gray-200">
                        <td class="py-4 px-6 border-b text-gray-700 text-lg">Madrid</td>
                        <td class="py-4 px-6 border-b text-gray-500">132,524</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
