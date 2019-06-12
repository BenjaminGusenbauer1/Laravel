<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Book;

class Image extends Model
{
    protected $fillable = [
        'url', 'title'
    ];

    public function book() : BelongsTo {
        return $this->belongsTo(Book::class);
    }


}
