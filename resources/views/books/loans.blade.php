@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Book Loans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                <div class="card">
                    <div class="card-header p-4">
                        <h4>Book Loan Management</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped dataTable">
                            <thead>
                            <tr class="bg-dark">
                                <th class="text-white">User</th>
                                <th class="text-white">Title</th>
                                <th class="text-white">Author</th>
                                <th class="text-white">Category</th>
                                <th class="text-white">Borrow Date</th>
                                <th class="text-white">Due Date</th>
                                <th class="text-white">Return Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($borrowedBooks as $borrowedBook)
                                <tr>
                                    <td>{{$borrowedBook->user->name}}</td>
                                    <td>{{$borrowedBook->book->title}}</td>
                                    <td>{{$borrowedBook->book->author}}</td>
                                    <td>{{$borrowedBook->book->category->name}}</td>
                                    <td>{{carbon::parse($borrowedBook->borrow_date)->format("d-F-Y") ?? "N/A"}}</td>
                                    <td>{{carbon::parse($borrowedBook->due_date)->format("d-F-Y") ?? "N/A"}}</td>
                                    <td>{{ $borrowedBook->return_date != null ? carbon::parse($borrowedBook->return_date)->format("d-F-Y") : "N/A" }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>

