<?php

namespace App\Controllers\Admin;

use App\Models\AktivitasModel;
use App\Models\DocumentModel;
use App\Models\MateriModel;
use App\Models\PengetahuanModel;
use CodeIgniter\Controller;

class LogAktivitas extends Controller
{
    protected $AktivitasModel, $materiModel, $pengetahuanModel, $dokumenModel;

    public function __construct()
    {
        $this->AktivitasModel = new AktivitasModel();
        $this->materiModel = new MateriModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->dokumenModel = new DocumentModel();
    }
    public function index()
    {
        // Cek apakah pengguna belum login
        if (!session('logged_in')) {
            return redirect()->to('/auth');
        }

        $data = [
            'title' => 'Data Log Aktivitas',
            'active' => 'LogActivity',
            'LogAktivitas' => $this->AktivitasModel->getAktivitas(),
            'logs' => $this->AktivitasModel->getLogs(),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
            'breadcrumb' => [
                'Dashboard' => base_url('admin/dashboard'),
                'Log Aktivitas' => base_url('admin/LogAktivitas'),
                'Active Page' => 'Data aktivitas'
            ]
        ];

        return view('admin/v_logAktivitas', $data);
    }

    // // Fungsi untuk mengambil data
    // public function saveLog($id_user, $email, $level)
    // {
    //     // Secara otomatis memasukkan data ke dalam database ketika pengguna login
    //     $data = [
    //         'email' => $email,
    //         'level' => $level,
    //         'tanggal_masuk' => date('Y-m-d H:i:s'), // Tanggal dan waktu saat ini
    //         'tanggal_keluar' => date('Y-m-d H:i:s') // Tanggal dan waktu saat ini
    //     ];

    //     // $this->AktivitasModel->insert($data);

    //     $this->AktivitasModel->saveLog($id_user, $email, $level);

    //     return redirect()->to('/');
    // }

    // Fungsi untuk menghapus data
    public function delete($id)
    {
        $this->AktivitasModel->deleteAktivitas($id);

        session()->setFlashdata('pesan', 'Data pengguna berhasil dihapus');
        return redirect()->to('/admin/LogAktivitas')->with('success', 'Dokumen berhasil dihapus');
    }
}
