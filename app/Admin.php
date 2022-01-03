<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Setting;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getEmailAttribute()
    {
        if(Setting::get('demo_mode', 0) == 1) {
            return substr($this->attributes['email'], 0, 3).'****'.substr($this->attributes['email'], strpos($this->attributes['email'], "@"));
        } else {
            return $this->attributes['email'];
        }
    }

    public function getMobileAttribute()
    {
        if(Setting::get('demo_mode', 0) == 1) {
            return substr($this->attributes['mobile'], 0, 5).'****';
        } else {
            return $this->attributes['mobile'];
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }
}
