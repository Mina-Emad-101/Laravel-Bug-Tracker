<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $priority_id
 * @property int $status_id
 * @property string $description
 * @property int|null $assigned_staff_id
 * @property int|null $reporter_id
 * @property string $created_at
 * @property-read \App\Models\User|null $assigned_staff
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\Priority $priority
 * @property-read \App\Models\User|null $reporter
 * @property-read \App\Models\Status $status
 *
 * @method static \Database\Factories\BugFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Bug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bug whereAssignedStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bug whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bug wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bug whereReporterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bug whereStatusId($value)
 *
 * @mixin \Eloquent
 */
class Bug extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'project_id',
        'priority_id',
        'status_id',
        'description',
        'assigned_staff_id',
        'reporter_id',
        'screenshot',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function assigned_staff(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
