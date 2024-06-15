<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'owned', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
