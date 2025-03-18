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
            {{ __('Book Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{route("manage-books.create")}}" class="btn btn-dark">
                                Add New Book
                            </a>
                        </div>
                        <br>
                        <hr>
                        <br>


                        <div class="container">
                            <h2 class="font-size-lg"><b>List of books in store</b></h2>
                            <br>
                            <hr>
                            <br>

                            <!-- Books Grid -->
                            <div class="row">
                                @foreach($books as $book)
                                    <div class="col-md-4">
                                        <div class="card mb-4 shadow-sm">
                                            @if($book->cover_image)
                                                <img src="{{ asset('storage/' . $book->cover_image) }}"
                                                     class="card-img-top" alt="Book Cover">
                                            @else
                                                <img src="{{ asset('images/default-cover.jpg') }}" class="card-img-top"
                                                     alt="Default Cover">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $book->title }}</h5>
                                                <p class="card-text">
                                                    <strong>Author:</strong> {{ $book->author }} <br>
                                                    <strong>Category:</strong> {{ $book->category->name }} <br>
                                                    <strong>Available:</strong> {{ $book->quantity }}
                                                </p>
                                                <a href="{{route("manage-books.show", $book->id)}}" class="btn btn-dark w-100">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
