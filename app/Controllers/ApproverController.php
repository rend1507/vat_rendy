<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\ReservationApproverModel;

class ApproverController extends BaseController
{
    // Apply approver filter to whole controller
    protected $helpers = ['approver'];

    public function index()
    {
        $data['title'] = "Beranda Approver";
        if (session()->has('user_id')) {
            if (session()->get('role') == 'approver') {
                $approverId = session()->get('user_id');

                $db = \Config\Database::connect();
                $builder = $db->table('reservation_approvers as ra');
                $pendingApprovals = $builder->select(
                    "ra.id, v.name, v.type, v.owned , r.driver, ra.status, r.created_at"
                )
                    ->where('approver_id', $approverId)
                    ->where('ra.status', 'pending')
                    ->join('reservations as r', 'r.id = ra.reservation_id', 'inner')
                    ->join('vehicles as v', 'r.vehicle_id = v.id', 'inner')
                    ->get()->getResultArray();

                return view('approver/index', [
                    'pendingApprovals' => $pendingApprovals,
                    ...$data
                ]);

            }
        }

        session()->destroy();
        return redirect()->to('/login');
    }

    public function approvalsList()
    {
        $data['title'] = "Daftar Reservasi";
        if (session()->has('user_id')) {
            if (session()->get('role') == 'approver') {
                $approverId = session()->get('user_id');

                $db = \Config\Database::connect();
                $builder = $db->table('reservation_approvers as ra');
                $reservations = $builder->select(
                    "ra.id, v.name, v.type, v.owned , r.driver, ra.status, r.created_at"
                )
                    ->where('approver_id', $approverId)
                    ->join('reservations as r', 'r.id = ra.reservation_id', 'inner')
                    ->join('vehicles as v', 'r.vehicle_id = v.id', 'inner')
                    ->get()->getResultArray();

                return view('approver/approvals', [
                    'reservations' => $reservations,
                    ...$data
                ]);

            }
        }

        session()->destroy();
        return redirect()->to('/login');
    }

    public function approveReservation($id)
    {
        $reservationApproverModel = new ReservationApproverModel();
        $reservationModel = new ReservationModel();

        $reservationApproverModel->update($id, ['status' => 'approved']);

        $reservationId = $reservationApproverModel->find($id)['reservation_id'];
        $allApprovals = $reservationApproverModel->where('reservation_id', $reservationId)->findAll();

        $allApproved = true;
        $allRejected = true;
        foreach ($allApprovals as $approval) {
            if ($approval['status'] != 'approved') {
                $allApproved = false;
            }
            if ($approval['status'] != 'rejected') {
                $allRejected = false;
            }
        }

        if ($allApproved) {
            $reservationModel->update($reservationId, ['status' => 'approved']);
        } elseif ($allRejected) {
            $reservationModel->update($reservationId, ['status' => 'rejected']);
        }

        return redirect()->back();
    }

    public function rejectReservation($id)
    {
        $reservationApproverModel = new ReservationApproverModel();
        $reservationModel = new ReservationModel();

        $reservationApproverModel->update($id, ['status' => 'rejected']);

        $reservationId = $reservationApproverModel->find($id)['reservation_id'];
        $allApprovals = $reservationApproverModel->where('reservation_id', $reservationId)->findAll();

        $allApproved = true;
        $allRejected = true;
        foreach ($allApprovals as $approval) {
            if ($approval['status'] != 'approved') {
                $allApproved = false;
            }
            if ($approval['status'] != 'rejected') {
                $allRejected = false;
            }
        }

        if ($allApproved) {
            $reservationModel->update($reservationId, ['status' => 'approved']);
        } elseif ($allRejected) {
            $reservationModel->update($reservationId, ['status' => 'rejected']);
        }

        return redirect()->back();
    }
}
