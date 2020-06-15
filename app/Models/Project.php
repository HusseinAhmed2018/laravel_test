<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'project_id');
    }

    public function hasTask()
    {
        return $this->tasks->count() > 0;
    }

    public function getStatusAttribute()
    {
        return $this->whereHas('tasks',function($query){
            $query->where('project_id',$this->id)
                ->where('status','in_progress');
        })->count();
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('policy',function (Builder $builder)
        {
            if (Auth::check())
            {
                $builder->where('user_id',Auth::id());
            }
        });
    }
}
