<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";

    public function website()
    {
        return $this->belongsTo('App\Website', 'website_id');
    }
}
