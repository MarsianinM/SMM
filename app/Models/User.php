<?php

namespace App\Models;

use App\Concerns\Models\HasRoles;
use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function (User $user) {
            $user->assignRole(config('auth.defaults.role'));
        });
    }

    /**
     * Get user's primary home route.
     *
     * @return string
     * @throws \Exception
     */
    public function getHomePageRoute()
    {
        if ($this->hasRole('client')) {
            return 'client.home';
        } elseif ($this->hasRole('author')) {
            return 'author.home';
        } elseif ($this->hasRole('admin')) {
            return 'admin.home';
        }

        throw new Exception('No primary home route found.');
    }

    /**
     * Get the projects for the user.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, $this->hasRole('client') ? 'client_id' : 'author_id');
    }
}
