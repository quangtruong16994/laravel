<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $primaryKey = 'id';
    protected $guarded = array('id');
    //
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
