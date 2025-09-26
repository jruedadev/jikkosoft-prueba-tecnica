<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = ['name', 'address'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
