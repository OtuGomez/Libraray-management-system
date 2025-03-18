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
                            <a href="{{route("manage-books.index")}}" class="btn btn-dark">
                                Back to Books
                            </a>
                        </div>
                        <br>


                        <div class="container">
                            <h2 class="mb-4">Book details</h2>

                            <form action="{{ route('manage-books.update', $book->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method("put")

                                <div class="row">
                                    <div class="text-center">
                                        <div class="col-md-4 offset-md-4">
                                            @if($book->cover_image)
                                                <img src="{{ asset('storage/' . $book->cover_image) }}"
                                                     class="card-img-top" alt="Book Cover">
                                            @else
                                                <img src="{{ asset('images/default-cover.jpg') }}" class="card-img-top"
                                                     alt="Default Cover">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Book Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Book Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ $book->title }}" required placeholder="Title">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                                    <input type="text" name="author"
                                           class="form-control @error('author') is-invalid @enderror"
                                           value="{{ $book->author }}" required placeholder="Author">
                                    @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ISBN -->
                                <div class="mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" name="isbn"
                                           class="form-control @error('isbn') is-invalid @enderror"
                                           value="{{ $book->isbn }}" placeholder="ISBN">
                                    @error('isbn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="quantity"
                                           class="form-control @error('quantity') is-invalid @enderror"
                                           value="{{ $book->quantity }}" required placeholder="Quantity">
                                    @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category (Dropdown) -->
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cover_image" class="form-label">Cover Image </label>
                                    <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" accept="image/*">
                                    @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update Book</button>
                                    <button type="button" class="btn btn-danger delete-book" data-id="{{ $book->id }}">Delete Book</button>

                                </div>

                            </form>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".delete-book").click(function() {
            let bookId = $(this).data("id");

            // Show confirmation alert
            if (confirm("Are you sure you want to delete this book? This action cannot be undone!")) {
                // Send DELETE request
                $.ajax({
                    url: "/manage-books/" + bookId,
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        window.location.href = "/manage-books";
                    },
                    error: function(xhr) {
                        alert("An error occurred while deleting the book.");
                    }
                });
            }
        });
    });
</script>
