<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'email', 'library_id'];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_member')
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }

}
