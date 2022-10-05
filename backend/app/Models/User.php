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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'plan',
        'admin',
        'user_terms'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function analysis()
    {
        return $this->hasOne(Analysis::class);
    }

    public function admin()
    {
        return $this->admin === true;
    }

    public function missingPlan()
    {
        return $this->plan === null;
    }

    public function userTermsAccepted()
    {
        return $this->user_terms == true;
    }

    public function needsPayment()
    {
        return $this->plan === 1 && $this->payment()->doesntExist();
    }

    public function needsAnalysis()
    {
        return $this->plan === 2 && $this->analysis()->doesntExist();
    }

    public function pendingAnalysis()
    {
        $analysis = $this->analysis;

        return $analysis !== null && $analysis->status === 0;
    }
}
