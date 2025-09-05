<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectsFactory> */
    use HasFactory;

public function owner()
{
    return $this->belongsTo(User::class, 'created_by');
}

public function workspace()
{
    return $this->belongsTo(Workspace::class, 'workspace_id');
}

public function tasks()
{
    return $this->hasMany(Task::class, 'task_id');
}
public function activitylogs()
{
    return $this->hasMany(activitylogs::class, 'project_id');
}
}
