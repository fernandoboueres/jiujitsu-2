<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasUuids, SoftDeletes;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';    
    
    /**
     * Attributes that can be mass assigned.
     * 
     * @var array
     */
    protected $fillable = [
        'cpf',
        'name',
        'email',
        'gender',
        'birth_date',
        'phone_number',
        'enrollment_date',
    ];
    
    /**
     * Get the responsibles for this student.
     */
    public function responsibles()
    {
        return $this->belongsToMany(StudentResponsible::class, foreignPivotKey: 'student_uuid', relatedPivotKey: 'student_responsible_uuid')
                    ->withPivot('filiation');
    }
}
