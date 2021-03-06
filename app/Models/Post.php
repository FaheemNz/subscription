<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    // RelationShips
    public function websites()
    {
        return $this->belongsTo(Website::class);
    }
}
