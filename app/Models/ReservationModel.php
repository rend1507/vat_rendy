<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservations';
    protected $allowedFields = ['vehicle_id', 'user_id', 'driver', 'status'];
}
