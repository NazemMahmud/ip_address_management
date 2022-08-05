<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    /** table name */
    protected $table = 'audits';


    /**
     * Relationship: 1 log belongs to only 1 user
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id' )->select('name');
    }

    /**
     * Change created_at format
     * @param $date
     * @return string
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i');
    }
}
