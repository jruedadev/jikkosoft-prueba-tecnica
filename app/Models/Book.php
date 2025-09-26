<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'isbn', 'library_id'];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'book_member')
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }

}
