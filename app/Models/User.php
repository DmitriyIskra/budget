<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'patronymic',
        'email',
        'phone',
        'avatar',
        'password',
        'is_admin',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Один к одному
    public function incomeItemLatest(): HasOne
    {
        // latestOfMany() одна последняя статья
        // withDefault() если статьи еще нет, то получаем null, и этот метод позволяет получить пустой инстанс модели 
        // можно использовать в любых отношениях, в том числе belongsTo
        // $this->hasOne(IncomeItemsModel::class)->latestOfMany()->withDefault(); - старый подход
        return $this->incomeItemLatest()->one()->latestOfMany()->withDefault(); // - новый подход
    }

    // Один ко многим
    public function incomeItems(): HasMany
    {
        return $this->hasMany(IncomeItemsModel::class);
    }
}
