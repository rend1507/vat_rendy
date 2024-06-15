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
        if(session()->has('user_id')){
            if(session()->get('role') == 'approver'){
                $reservationApproverModel = new ReservationApproverModel();
                $approverId = session()->get('user_id');
                $pendingApprovals = $reservationApproverModel->where('approver_id', $approverId)->where('status', 'pending')->findAll();

                return view('approver/index', [
                    'pendingApprovals' => $pendingApprovals,
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

        return redirect()->to('/approver/pending_approvals');
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

        return redirect()->to('/approver/pending_approvals');
    }
}
