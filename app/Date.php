<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = ['event_id','full_date','month','date','year'];
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
