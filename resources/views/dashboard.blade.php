<style>
    .card-img-top {
        width: 100%; /* Ensure the image fills the card's width */
        height: 250px; /* Set a fixed height */
        object-fit: cover; /* Maintain aspect ratio and cover the area */
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Library Catalogue') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                <div class="card">
                    <div class="card-body">

                        <div class="container">
                            <h2>Browse Books</h2>

                            <!-- Search and Filter Section -->
                            <form method="GET" action="{{route("books.search")}}" class="mb-4 d-flex gap-2">
                                @csrf
                                <input type="text" name="title" class="form-control" placeholder="Title"
                                       value="{{ request('title') }}">
                                <select name="genre" class="form-control">
                                    <option value="">Select Genre</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ request('genre') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="text" name="author" class="form-control" placeholder="Author"
                                       value="{{ request('author') }}">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                            <br>
                            <hr>
                            <br>

                            <!-- Books Grid -->
                            <div class="row">
                                @if($books->count() > 0)
                                    @foreach($books as $book)
                                        <div class="col-md-4">
                                            <div class="card mb-4 shadow-sm">
                                                @if($book->cover_image)
                                                    <img src="{{ asset('storage/' . $book->cover_image) }}"
                                                         class="card-img-top" alt="Book Cover">
                                                @else
                                                    <img src="{{ asset('images/default-cover.jpg') }}"
                                                         class="card-img-top"
                                                         alt="Default Cover">
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $book->title }}</h5>
                                                    <p class="card-text">
                                                        <strong>Author:</strong> {{ $book->author }} <br>
                                                        <strong>Category:</strong> {{ $book->category->name }} <br>
                                                        <strong>Category:</strong> {{ $book->category->name }} <br>

                                                        @if($book->quantity <= 0)
                                                            <strong class="text-center text-danger">Out of
                                                                Stock</strong> <br>
                                                        @else
                                                            <strong class="text-center text-success">In Stock</strong>
                                                            <br>
                                                        @endif

                                                    </p>
                                                    <br>
                                                    <hr>
                                                    <br>

                                                    @if(auth()->user()->borrowedBooks->contains($book->id))
                                                        <p class="text-info text-center">
                                                            <b> You already borrowed</b>
                                                            <button class="btn btn-primary btn-sm return-book"
                                                                    type="button" data-id="{{ $book->id }}">Return Book
                                                            </button>
                                                        </p>
                                                    @else
                                                        @if($book->quantity > 0)
                                                            <button type="button"
                                                                    class="btn btn-success borrow-book w-100"
                                                                    data-id="{{ $book->id }}">Borrow Book
                                                            </button>
                                                        @else
                                                            <p class="text-center text-pretty">
                                                                <b>Check out later</b>
                                                            </p>
                                                        @endif
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="alert alert-danger text-center" role="alert">
                                            No book found for the provided filter
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>

<script>
    $(document).ready(function () {

        // Borrow book
        $(".borrow-book").click(function () {
            let bookId = $(this).data("id");

            // Show confirmation alert
            Swal.fire({
                title: "Confirm?",
                text: "Are you sure you want to borrow the selected book?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/borrow-book/" + bookId,
                        type: "POST",
                        data: {
                            _method: "POST",
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            Swal.fire("Borrow!", response.message, "success").then(() => {
                                window.location.href = "/dashboard";
                            });
                        },
                        error: function (xhr) {
                            Swal.fire("Error", "An error occurred while borrowing the book.", "error");
                        }
                    });
                }
            });
        });


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
                                window.location.href = "/dashboard";
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
