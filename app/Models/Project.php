<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'project_date',
        'link_github',
        'github_url',
        'type_id',
        'project_image',
        'slug'
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
