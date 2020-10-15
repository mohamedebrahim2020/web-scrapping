<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = "links";

    public function website()
    {
        return $this->belongsTo('App\Website', 'website_id');
    }

    public function itemSchema()
    {
        return $this->belongsTo('App\ItemSchema', 'item_schema_id');
    }
}
