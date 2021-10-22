<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'api_token',
        'created_at',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function UsersWithData(): array
    {
        $users = self::all();
        $data = [];
        foreach ($users as $user) {
            $data[] = array_merge($user->only(['id', 'email', 'role', 'created_at', 'status']), ['data' => $user->data]);
        }
        return $data;
    }

    public function data() {
        switch ($this->role) {
            case 'company':
                return $this->hasOne(CompanyData::class);
            default:
                return $this->hasOne(UserData::class);
        }
    }
}
