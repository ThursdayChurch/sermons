<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];
    protected $connection = 'mysql';

    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }
    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
