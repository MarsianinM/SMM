<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the setting's value.
     *
     * @param  string  $value
     * @return string
     */
    public function getValueAttribute($value)
    {
        settype($value, $this->type);

        return $value;
    }
}
