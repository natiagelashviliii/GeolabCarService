<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

	/*
	 *	Slider Status:  0-inactive, 1-active, 2-deleted
	 *
	*/

	protected $fillable = ['title'];
}
