<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name', 
                           'description',
                           'project_date', 
                           'link_github',
                           'type_id',
                            'project_image',
                            'slug'
                          ];

    // aggiungiamo la possibilità di leggere le tabelle a lui collegate
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
