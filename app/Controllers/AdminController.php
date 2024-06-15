<?php

namespace App\Controllers;

use App\Models\VehicleModel;
use App\Models\ReservationModel;
use App\Models\ReservationApproverModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    // Apply admin filter to whole controller
    protected $helpers = ['admin'];
    public function index()
    {
        $data['title'] = "Beranda Admin";

        $db      = \Config\Database::connect();
        $builder = $db->table('reservations as r');
        $reservations = $builder->select(
            "r.id, v.name, v.type, v.owned , r.driver, r.status, r.created_at"
        )
                ->join('vehicles as v', 'r.vehicle_id = v.id', 'inner')
                 ->get()->getResultArray();

        return view('admin/index', [
            'reservations' => $reservations,
            ...$data,
        ]);
    }

    public function createReservation()
    {
        $data['title'] = "Buat Reservasi";

        $vehicleModel = new VehicleModel();
        $userModel = new UserModel();
        $vehicles = $vehicleModel->findAll();
        $approvers = $userModel->where('role', 'approver')->findAll();

        return view('admin/pesan', [
            'vehicles' => $vehicles,
            'approvers' => $approvers,
            ...$data,
        ]);
    }

    public function storeReservation()
    {
        $reservationModel = new ReservationModel();
        $reservationApproverModel = new ReservationApproverModel();

        $approvers = $this->request->getPost('approver_ids');
        if($approvers){
            if(sizeOf($approvers) >= 2){
                $data = [
                    'vehicle_id' => $this->request->getPost('vehicle_id'),
                    'user_id' => session()->get('user_id'),
                    'driver' => $this->request->getPost('driver'),
                    'status' => 'pending'
                ];
                $reservationId = $reservationModel->insert($data);
                foreach ($approvers as $approverId) {
                    $reservationApproverModel->insert([
                        'reservation_id' => $reservationId,
                        'approver_id' => $approverId,
                        'status' => 'pending'
                    ]);
                }

                return redirect()->to('/admin');
            }else{
                return redirect()->back()->with('error_approver', 'Approver minimal 2'); 
            }
        }else{
            return redirect()->back()->with('error_approver', 'Pilih salah satu approver'); 
        }
    }



    public function removeReservation($id)
    {
        $reservationModel = new ReservationModel();

        // Check if the reservation exists
        $reservation = $reservationModel->find($id);

        if ($reservation) {
            // Delete the reservation
            $reservationModel->delete($id);
            return redirect()->to('/admin')->with('message', 'Sukses hapus reservasi.');
        } else {
            throw new PageNotFoundException('Reservasi dengan ID ' . $id . ' tidak ditemukan.');
        }
    }
}
