<?php

namespace App\Controllers;
use App\Models\VehicleModel;

class VehicleController extends BaseController
{
    // Apply admin filter to whole controller
    protected $helpers = ['admin'];

    public function index()
    {
        $data['title'] = "Manajemen Kendaraan";

        $vehicleModel = new VehicleModel();
        $vehicles = $vehicleModel->findAll();

        return view('admin/vehicles/manage', ['vehicles' => $vehicles, ...$data]);
    }


    public function form($id = null)
    {
        $action = "Tambah";
            
        $data['title'] = $action." Kendaraan";

        if($id != null){
            $action = "Update";

            $vehicleModel = new VehicleModel();
            $vehicle = $vehicleModel->find($id);
            if ($vehicle) {
                $data['title'] = $action." Kendaraan ".$vehicle['name']." (".$vehicle['id'].")";
                $data['vehicle'] = $vehicle;
                return view('admin/vehicles/form', [...$data]);
            }

            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan'); 
        }


        return view('admin/vehicles/form', [...$data]);
    }

    public function edit($i)
    {
        $data['title'] = "Update Kendaraan";

        return view('admin/vehicles/form', [...$data]);
    }
    
    
    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'owned' => $this->request->getPost('owned'),
        ];
        
        $vehicleModel = new VehicleModel();
        if ($vehicleModel->insert($data)) {
            return redirect()->to('/admin/vehicles')->with('message', 'Kendaraan '.$data['name'].' Ditambah');
        }

        return redirect()->back()->with('error', $vehicleModel->errors());
    }


    public function update($id = null)
    {
        $data = [
            'name' => $this->request->getRawInput()['name'],
            'type' => $this->request->getRawInput()['type'],
            'owned' => $this->request->getRawInput()['owned'],
        ];
        $vehicleModel = new VehicleModel();


        if ($vehicleModel->update($id, $data)) {
            return redirect()->to('/admin/vehicles')->with('message', 'Kendaraan '.$data['name'].' Diupdate');
        }

        return redirect()->back()->with('error', $vehicleModel->errors());
    }

    public function delete($id = null)
    {
        $vehicleModel = new VehicleModel();

        if ($vehicleModel->delete($id)) {
            return redirect()->to('/admin/vehicles')->with('message', 'Kendaraan Dihapus');
        }

        return redirect()->back()->with('error', 'Kendaraan tidak ditemukan');
    }
}