<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Taskrequest extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function scopeActive($query)
    {
        $uid = \Auth::user()->id;
        if($uid != '1')
        {
            return $query->where('user', $uid);
        }       
    }
}
