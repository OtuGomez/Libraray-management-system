@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Borrowed Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                <div class="card">
                    <div class="card-header p-4">
                        <h4>My borrow Books</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{route("dashboard")}}" class="btn btn-dark">
                                Open Book Catalogue
                            </a>
                        </div>
                        <br>
                        <table class="table table-bordered table-hover table-striped dataTable">
                            <thead>
                            <tr class="bg-dark">
                                <th class="text-white">Title</th>
                                <th class="text-white">Author</th>
                                <th class="text-white">Category</th>
                                <th class="text-white">Borrow Date</th>
                                <th class="text-white">Due Date</th>
                                <th class="text-white">Return Date</th>
                                <th class="text-white text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($borrowedBooks as $borrowedBook)
                                    <tr>
                                        <td>{{$borrowedBook->title}}</td>
                                        <td>{{$borrowedBook->author}}</td>
                                        <td>{{$borrowedBook->category->name}}</td>
                                        <td>{{carbon::parse($borrowedBook->pivot->borrow_date)->format("d-F-Y") ?? "N/A"}}</td>
                                        <td>{{carbon::parse($borrowedBook->pivot->due_date)->format("d-F-Y") ?? "N/A"}}</td>
                                        <td>{{ $borrowedBook->pivot->return_date != null ? carbon::parse($borrowedBook->pivot->return_date)->format("d-F-Y") : "N/A" }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm return-book"
                                                    type="button" data-id="{{ $borrowedBook->id }}">Return Book
                                            </button>
                                        </td>
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


<script>
    $(document).ready(function(){
        // return the borrowed book
        $(".return-book").click(function () {
            let bookId = $(this).data("id");

            // Show confirmation alert
            Swal.fire({
                title: "Confirm?",
                text: "Do you want to return the borrowed book?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/return-borrow-book/" + bookId,
                        type: "POST",
                        data: {
                            _method: "POST",
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            Swal.fire("Return!", response.message, "success").then(() => {
                                window.location.href = "/loan-books";
                            });
                        },
                        error: function (xhr) {
                            Swal.fire("Error", "An error occurred while returning the book.", "error");
                        }
                    });
                }
            });
        });
    });
</script>
