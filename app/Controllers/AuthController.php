<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('role') == 'approver') {
            return redirect()->to('/approver');
        }
        return view('auth/login');
    }

    public function login()
    {
        if (session()->get('role') == 'admin') {
            return redirect()->to('/admin');
        } elseif (session()->get('role') == 'approver') {
            return redirect()->to('/approver');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Lakukan validasi login
        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Jika password cocok, atur session dan arahkan ke halaman yang sesuai
                $userData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'name' => $user['name'],
                    'role' => $user['role'] // asumsikan 'role' adalah kolom peran di tabel pengguna
                ];

                // Atur session
                session()->set($userData);

                // Redirect sesuai peran
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin');
                } elseif ($user['role'] == 'approver') {
                    return redirect()->to('/approver');
                }
            }
        }

        return redirect()->to('/login')->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
