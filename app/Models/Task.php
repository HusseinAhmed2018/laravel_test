<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'status',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('policy',function (Builder $builder)
        {
            if (Auth::check())
            {
                $builder->wherehas('project',function ($query){
                    $query->where('user_id',Auth::id());
                });
            }
        });
    }
}
