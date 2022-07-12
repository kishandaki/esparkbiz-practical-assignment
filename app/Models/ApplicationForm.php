<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
	    'last_name',
	    'email',
	    'mobile_no',
        'date_of_birth',
	    'gender',
	    'address1',
	    'address2',
	    'city',
        'state',
        'country',
	    'zip_code',
	    'notice_period',
	    'expected_CTC',
	    'current_CTC',
	    'department',
	    'relationship_status',
    ];
}
