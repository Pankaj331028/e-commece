<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $guarded = [];

    Schema::create('subscribers', function (Blueprint $table) {
        $table->id();
        $table->string('email');
        $table->timestamps();
    });
}
