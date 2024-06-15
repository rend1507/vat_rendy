<?php
namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['vehicle_id', 'service_date', 'description', 'next_service_date'];

    public function getByVehicle($vehicle_id)
    {
        return $this->where('vehicle_id', $vehicle_id)->findAll();
    }

    public function createService($data)
    {
        return $this->insert($data);
    }
}
