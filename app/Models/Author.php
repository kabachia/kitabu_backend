<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'biography', 'email'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
	'middle_name' => '',
	'biography' => '',

    ];

    /**
     * Get books by the author.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }


}
