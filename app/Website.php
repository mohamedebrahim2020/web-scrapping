<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = "website";

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
