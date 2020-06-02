<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/** 
 * Model of Contact
 * @package App\Models\Contact;
 */
class Contact extends Model
{
    /**
     * Fillabe columns
     * @var
     */
    protected $fillable = [
        'phone',
        'name'
    ];
}
