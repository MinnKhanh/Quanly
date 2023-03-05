<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'id_account',
        'position',
        'department',
        'cmtnd',
        'phone',
        'email',
        'gender',
        'bank_number',
        'bank_name',
        'birth_day',
        'home_town',
        'img',
        'status',
        'description',
        'date_entered',
    ];
    public function Position()
    {
        return $this->belongsTo(Position::class, 'position', 'id');
    }
    public function Department()
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function Account()
    {
        return $this->belongsTo(User::class, 'id_account', 'id');
    }
    public function ManagerDepartment()
    {
        return $this->hasOne(Department::class, 'manager', 'id');
    }
    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
}
