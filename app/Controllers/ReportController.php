<?php

namespace App\Controllers;

use App\Models\VehicleModel;
use App\Models\ReservationModel;
use App\Models\ReservationApproverModel;
use App\Models\UserModel;

class ReportController extends BaseController
{
    // Apply admin filter to whole controller
    protected $helpers = ['admin'];
    public function index()
    {
        $data['title'] = "Laporan";

        return view('report/index', [
            ...$data,
        ]);
    }
}
    ?>