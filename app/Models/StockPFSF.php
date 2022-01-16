<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPFSF extends Model
{
    protected $table = 'stock_pfsf';
    protected $fillable = ['quantite'];

    use HasFactory;
}
