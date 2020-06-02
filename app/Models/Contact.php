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

    /**
     * Relation with user
     * 
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Check bookmarked with user
     * 
     * @return bool
     */
    public function getBookmarkAttribute()
    {
        try {

            $user_id = auth()->user()->id;

            return $this->users->contains($user_id);
        }
        catch (\Exception $e) {
            return false;
        }
    }
}
