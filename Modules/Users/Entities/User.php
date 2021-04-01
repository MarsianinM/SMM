<?php

namespace Modules\Users\Entities;

use App\Concerns\Models\HasRoles;
use App\Models\Balance;
use App\Models\Project;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;

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

    protected array $fillable = [
        'name','email','email_verified_at','password','remember_token','created_at','updated_at','active'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function (User $user) {
            $user->assignRole('client');
            $user->assignRole('author');
            $user->setActiveRole('author');
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

        if ($this->activeRoleIs('client')) {
            return 'client.home';
        } elseif ($this->activeRoleIs('author')) {
            return 'author.home';
        } elseif ($this->activeRoleIs('admin')) {
            return 'admin.home';
        }

        throw new Exception('No primary home route found.');
    }

    /**
     * Get the projects for the user.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, $this->activeRoleIs('client') ? 'client_id' : 'author_id');
    }

    /**
     * Get user's balance by the given currency.
     *
     * @param $currency
     * @return mixed
     */
    public function getBalanceByCurrency($currency)
    {
        return number_format($this->balances()->whereCurrency($currency)->sum('amount'), 2);
    }

    /**
     * Get the balances for the user.
     */
    public function balances()
    {
        return $this->hasMany(Balance::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('user_icon');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(120)
            ->height(120)
            ->sharpen(10)
            ->nonOptimized();
    }
}
