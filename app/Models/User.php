<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $primaryKey = 'userID';
    protected $table = 'user';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'firstName', 'lastName', 'address'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    // Relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'userID');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'userID');
    }

    // Mutator for 'admin' attribute to ensure it's treated as a boolean
    public function setAdminAttribute($value)
    {
        $this->attributes['admin'] = (bool) $value;
    }

    // Accessor for 'admin' attribute to ensure it's treated as a boolean
    public function getAdminAttribute($value)
    {
        return (bool) $value;
    }
}
