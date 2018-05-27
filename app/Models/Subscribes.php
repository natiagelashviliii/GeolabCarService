<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribes extends Model
{
    public $timestamps  = false;
	protected $fillable = ['email_id', 'type'];
}
