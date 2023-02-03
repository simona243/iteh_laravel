<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zanr extends Model
{
    use HasFactory;
    protected $fillable = [
        'naziv',
 
    ];  


    public function knjige()
    {
        return $this->hasMany(Knjiga::class);
    }






}
