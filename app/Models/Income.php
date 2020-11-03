<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'description', 'amount', 'currency', 'received_at'];

    protected $dates = ['received_at', 'created_at', 'updated_at', 'deleted_at'];
}
