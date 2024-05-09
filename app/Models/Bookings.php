<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{

    protected $table = 'bookings';

    protected $primaryKey = 'id';

    public $timestamps = false;
    
    protected $fillable = [
        'full_name',
        'phone_number', 
        'email', 
        'booking_date'];
        
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
