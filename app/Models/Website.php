<?php

namespace App\Models;

use App\Mail\SubscriptionMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    // RelationShips
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
