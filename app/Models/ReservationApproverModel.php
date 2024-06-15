<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationApproverModel extends Model
{
    protected $table = 'reservation_approvers';
    protected $allowedFields = ['reservation_id', 'approver_id', 'status'];
}
