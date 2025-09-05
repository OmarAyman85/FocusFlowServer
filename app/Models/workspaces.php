<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use App\Models\ActivityLog;
use Illuminate\Support\Str;

class Workspace extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workspaces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'owner_id',
        'logo',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot method to auto-generate slug from name.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($workspace) {
            if (empty($workspace->slug)) {
                $workspace->slug = Str::slug($workspace->name);
            }
        });
    }

    /**
     * Get the owner of the workspace.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the members of the workspace.
     */
    public function members()
    {
        return $this->belongsToMany(User::class, 'workspace_users', 'workspace_id', 'user_id')
                    ->withTimestamps()
                    ->withPivot('role'); // optional if you track roles
    }

    /**
     * Get the projects under this workspace.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'workspace_id');
    }

    /**
     * Get the activity logs for this workspace.
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class, 'workspace_id');
    }

    /**
     * Scope to filter workspaces by owner.
     */
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('owner_id', $userId);
    }
}
