<?php

namespace App\Models;

use App\Models\Comentarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ["titulo","contenido","categorias_id"];

    /**
     * Obtener los comentarios del post.
     */
    public function comentarios()
    {
        return $this->hasMany(Comentarios::class);
    }
}
