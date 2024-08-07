<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anime extends Model
{
    protected $table = "anime";

    use HasFactory;

    protected $fillable = [
        'titulo', 
        'resumo', 
        'genero', 
        'lancamento',
        'episodios'
    ];
}