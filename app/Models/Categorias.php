<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable = ["nombre"];

    
    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
}
