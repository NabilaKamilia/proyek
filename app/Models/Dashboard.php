<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $table = 'tbl_recipes';
    protected $primaryKey = 'id_resep';
    protected $increments = false;

    protected $fillable = [ 'nama', 'penulis', 'tema', 'resep'];
}
