<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewLetter extends Model
{
    use HasFactory;

    public function scopeSubscribed()
    {
        return $this->where('subscribed', true);
    }
}
