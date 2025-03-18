<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'isbn' => '9780743273565',
                'quantity' => 10,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/gatsby.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'isbn' => '9780061120084',
                'quantity' => 7,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/mockingbird.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'isbn' => '9780451524935',
                'quantity' => 12,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/1984.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'isbn' => '9781503290563',
                'quantity' => 8,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/pride.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'isbn' => '9780547928227',
                'quantity' => 6,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/hobbit.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Moby Dick',
                'author' => 'Herman Melville',
                'isbn' => '9781503280786',
                'quantity' => 5,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/mobydick.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'War and Peace',
                'author' => 'Leo Tolstoy',
                'isbn' => '9781853260629',
                'quantity' => 9,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/warpeace.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Crime and Punishment',
                'author' => 'Fyodor Dostoevsky',
                'isbn' => '9780486415871',
                'quantity' => 11,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/crime.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'isbn' => '9780316769488',
                'quantity' => 7,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/catcher.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'isbn' => '9780060850524',
                'quantity' => 10,
                'category_id' => rand(1, 30),
                'cover_image' => 'book_covers/bravenew.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data into the books table
        Book::query()->insert($books);
    }
}
