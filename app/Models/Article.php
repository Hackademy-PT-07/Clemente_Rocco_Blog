<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //apriamo le porte 
    protected $fillable = ['user_id','title', 'category_id', 'description', 'body'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
