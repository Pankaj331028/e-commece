<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['status','title','menu_title','show_in_navigation','show_in_footer','description','url_key','meta_title','meta_tag','meta_description'];
}
