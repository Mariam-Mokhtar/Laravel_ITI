<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $fillable=[
        'title',
        'description',
        'user_id',
        'image_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
