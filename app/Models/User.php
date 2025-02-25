<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['email', 'password'];

    // Relations
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function developer()
    {
        return $this->hasOne(Developer::class);
    }

    public function administrator()
    {
        return $this->hasOne(Administrator::class);
    }

    public function ticketsCreated()
    {
        return $this->hasMany(Ticket::class, 'createdBy');
    }

    public function ticketsAssigned()
    {
        return $this->hasMany(Ticket::class, 'assignedTo');
    }
}
