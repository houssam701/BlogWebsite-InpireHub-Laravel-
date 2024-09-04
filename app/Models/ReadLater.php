<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadLater extends Model
{
    use HasFactory;
    protected $table = 'read_later';

    protected $fillable = ['post_id', 'user_id'];

}