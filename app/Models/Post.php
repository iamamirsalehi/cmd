<?php

namespace App\Models;

use App\Traits\Commentable;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Commentable, Taggable;

    protected $guarded = [];

    const POST_STATUSES = [
        'پیش نویس', 
        'زمان بندی', 
        'باز بینی', 
        'منتشر شده', 
    ];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = preg_match('/\s+/', '-', $value);
    }

    public static function postStatuses(int $status = null)
    {
        if(!is_null($status) and in_array($status, array_keys(self::POST_STATUSES)))
            return self::POST_STATUSES[$status];

        return self::POST_STATUSES;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    
}