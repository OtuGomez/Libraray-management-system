<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == "user")
        {
            $books = Book::query()
                ->get();

            $categories = Category::query()->get();
            $borrowedBooks = User::query()->find(Auth::id())->borrowedBooks;
            return view('dashboard', compact('books', 'categories', 'borrowedBooks'));
        }

        return redirect()->route("manage-books.index");
    }


    public function filterBook(Request $request) : View
    {
        $query = Book::query();

        // filter the catalogue by title
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // filter the catalogue by author
        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }

        // filter the catalogue by category or genre
        if ($request->has('genre') && !empty($request->genre)) {
            $query->where('category_id', $request->genre);
        }

        // return request gotten from the database
        $books = $query->get();
        $categories = Category::all();

        return view('dashboard', compact('books', 'categories'));
    }



    public function borrowBook(string $id): JsonResponse
    {
        $max_book_to_borrow = (int)env('MAX_NUMBER_OF_BOOK_TO_BORROW');

        // check if user has already borrowed
        $book_borrows = Loan::query()
            ->where('user_id', Auth::id())
            ->where('status', "borrowed")
            ->get();

        // prevent user from borrowing
        if ($book_borrows->count() >= $max_book_to_borrow) {

            return response()->json(['message' => 'Sorry! You have reached your maximum allowable number of books borrowed.']);
        }

        // check the book existence
        $book = Book::query()->findOrFail($id);

        // loan book to user
        $book_allowable_borrow_days = (int)env('BOOK_ALLOWABLE_BORROW_DAYS');

        Loan::query()->create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
            'due_date' => now()->addDays($book_allowable_borrow_days)
        ]);

        $book->quantity = $book->quantity - 1;
        $book->save();

        return response()->json(['message' => 'Book has successfully been borrowed!']);
    }



    public function returnBorrowedBook(string $id): JsonResponse
    {
        // check the book existence
        $book = Book::query()->findOrFail($id);

       // get the borrowed book
        $borrowedBooks = Loan::query()
            ->where('user_id', Auth::id())
            ->where("book_id", $book->id)
            ->where("status", "borrowed")
            ->firstOrFail();

        //remove from user borrowed list
        $borrowedBooks->status = "returned";
        $borrowedBooks->return_date = now();
        $borrowedBooks->save();

        // increase the available count
        $book->quantity = $book->quantity + 1;
        $book->save();

        return response()->json(['message' => 'Book has successfully been returned!']);
    }


    public function myLoadBooks() : View
    {
        $borrowedBooks = User::query()->find(Auth::id())->borrowedBooks;
        return view("borrowed-books", compact('borrowedBooks'));
    }


}
