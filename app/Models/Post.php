<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model,SoftDeletes};


class Post extends Model
{
    use HasFactory,SoftDeletes;

}
