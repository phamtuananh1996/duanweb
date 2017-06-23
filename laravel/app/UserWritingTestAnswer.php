<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWritingTestAnswer extends Model
{
     protected $fillable = [
        'user_test_id', 'result_content','is_checked',
    ];
}
