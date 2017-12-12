<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setInvitedBy($invitedBy)
    {
        $this->invited_by = $invitedBy;
    }

    public function setInviteToken($token)
    {
        $this->confirm_token = $token;
    }

    public function activeAccount()
    {
        $this->is_active = true;
        $this->confirm_token = 'used';
    }

}
