<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $filable = ['type', 'description', 'amount', 'currency'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
