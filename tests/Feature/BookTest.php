<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Author;
use App\Models\Book;

class BookTest extends TestCase
{
    /**
     * A feature test to create a new book.
     */
    public function test_add_book()
    {
	$authors = Author::inRandomOrder()->limit(1)->get();
	$payload = [
            'ISBN' => random_int(1000000000, 9999999999),
	    'name' => 'Test Book',
	    'author_id' => $authors[0]->id
	];
        $response = $this->json('POST','api/books',$payload)->assertStatus(201);
    }

    /**
     * A feature test to get all books.
     */
    public function test_get_all_books()
    {
	$response = $this->get('/api/books')->assertStatus(200);
    }

    /**
     * A feature test to get book by ISBN.
     */
    public function test_get_book()
    {
	$books = Book::inRandomOrder()->limit(1)->get();
        $response = $this->get('/api/books/'.$books[0]->ISBN)->assertStatus(200);
    }

}
