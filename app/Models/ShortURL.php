<?php

namespace App\Models;

use AshAllenDesign\ShortURL\Models\ShortURL as ShortURLModel;

class ShortURL extends ShortURLModel
{

    public function __construct()
    {
        parent::__construct();
        array_push($this->fillable, 'user_id');
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
