<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable=['status','title','use_for','identifier','description','ordering','meta_title','meta_tag','meta_description'];
}
