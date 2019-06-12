<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Status;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'number', 'total_net', 'total_gross'
    ];

    public function books() : BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statuses() : HasMany
    {
        return $this->hasMany(Status::class);
    }
}
