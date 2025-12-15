<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category',
        'description',
        'content',
        'tags',
        'thumbnail',
        'featured',
        'github_url',
        'demo_url',
        'order',
    ];

    protected $casts = [
        'tags' => 'array',
        'featured' => 'boolean',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function categories(): array
    {
        return self::distinct()->pluck('category')->sort()->values()->toArray();
    }
}
