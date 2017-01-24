<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates=['published_at'];

    protected $fillable = ['title', 'introduction', 'content', 'published_at'];

    public function setPublishedAttribute($date)
    {
        $this->attributes['published_at'] =Carbon::createFromFormat('Y-m-d',$date);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
