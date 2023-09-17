<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Author;

class AuthorTest extends TestCase
{
    /**
     * A feature test to create a new author.
     */
    public function test_add_author()
    {
	$payload = [
            'first_name' => 'John',
	    'last_name' => 'Kiriamiti',
	    'biography' => 'John Kiriamiti (born 14 February 1950) is a Kenyan former bank robber turned writer.',
	    'email' => 'john@kiriamiti.com'
	];
        $response = $this->json('POST','api/authors',$payload)->assertStatus(201);
    }

    /**
     * A feature test to get all  authors.
     */
    public function test_get_all_authors()
    {
	$response = $this->get('/api/authors')->assertStatus(200);
    }

    /**
     * A feature test to get authors by id.
     */
    public function test_get_author()
    {
	$authors = Author::inRandomOrder()->limit(1)->get();
        $response = $this->get('/api/authors/'.$authors[0]->id)->assertStatus(200);
    }

}
