<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeItemsModel extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'summ',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
