<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'os', 
        'software', 
        'createdBy',
        'assignedTo',
    ];

    // Relations
    public function creator()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignedTo');
    }
}
