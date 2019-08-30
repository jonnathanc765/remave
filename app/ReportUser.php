<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportUser extends Model
{
     use SoftDeletes;

     protected $fillable = ['user_id', 'user_reported', 'report_affair_id', 'message'];

     protected $dates = ['deleted_at'];
}
