<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_logs extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityLogsFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workspace(){
        return $this->belongsTo(workspaces::class, 'workspace_id');
    }
    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function task(){
        return $this->belongsTo(Task::class, 'task_id');
    }

}
