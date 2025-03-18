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
                            <h2 class="mb-4">Add New Book</h2>

                            <form action="{{ route('manage-books.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <!-- Book Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Book Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}" required placeholder="Title">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                                    <input type="text" name="author"
                                           class="form-control @error('author') is-invalid @enderror"
                                           value="{{ old('author') }}" required placeholder="Author">
                                    @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ISBN -->
                                <div class="mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" name="isbn"
                                           class="form-control @error('isbn') is-invalid @enderror"
                                           value="{{ old('isbn') }}" placeholder="ISBN">
                                    @error('isbn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="quantity"
                                           class="form-control @error('quantity') is-invalid @enderror"
                                           value="{{ old('quantity') }}" required placeholder="Quantity">
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
                                                value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cover_image" class="form-label">Cover Image <span class="text-danger">*</span></label>
                                    <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" accept="image/*" required>
                                    @error('cover_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Book</button>
                                    <a href="{{ route('manage-books.index') }}" class="btn btn-danger">Cancel</a>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
