<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookMember extends Pivot
{
    protected $table = 'book_member';

    protected $fillable = [
        'book_id',
        'member_id',
        'borrowed_at',
        'returned_at',
    ];

    protected $dates = ['borrowed_at', 'returned_at'];
}
