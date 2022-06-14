<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function websites()
    {
        return $this->belongsTo(Website::class);
    }
}
