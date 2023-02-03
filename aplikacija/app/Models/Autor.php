<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $fillable = [
        'ime',
        'prezime',
        'datumRodj',
        'mestoRodj'
    ];




    public function knjige()
    {
        return $this->hasMany(Knjiga::class);
    }


}
