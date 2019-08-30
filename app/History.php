<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
	 protected $fillable = ['user_id', 'role', 'module', 'action', 'ip', 'url', 'browser'];
}
