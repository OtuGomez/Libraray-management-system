<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $books = Book::query()->get();
        $categories = Category::query()->get();
        return view("books.index", compact("books", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $categories = Category::query()->orderby("name", "asc")->get();
        return view("books.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('book_covers', 'public');
        } else {
            $imagePath = null;
        }

        // Create book with cover image
        Book::query()->create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'cover_image' => $imagePath,
        ]);

        return redirect()->route('manage-books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : View
    {
        $book = Book::query()->findOrFail($id);
        $categories = Category::query()->orderby("name", "asc")->get();
        return view("books.show", compact("categories","book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Get the book details
        $book = Book::query()->findOrFail($id);

        // Validate request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id, // Allow old ISBN for the same book
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable', // Image validation remains optional
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('book_covers', 'public');
        } else {
            $imagePath = null;
        }

        // Create book with cover image
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'cover_image' => $imagePath == null ? $book->cover_image : $imagePath,
        ]);

        return redirect()->route('manage-books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $book = Book::query()->findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully!']);
    }

}
