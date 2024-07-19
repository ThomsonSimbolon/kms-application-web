<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DocumentModel;
use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use App\Models\MateriModel;
use App\Models\PegawaiModel;
use App\Models\PengetahuanModel;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $dokumenModel;
    protected $pengetahuanModel;
    protected $materiModel;
    protected $dosenModel;
    protected $mahasiswaModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dokumenModel = new DocumentModel();
        $this->pengetahuanModel = new PengetahuanModel();
        $this->materiModel = new MateriModel();
        $this->dosenModel = new DosenModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {

        // Cek apakah pengguna sudah login atau belum
        if (!session()->get('logged_in', true)) {
            // Jika belum, redirect ke halaman autentikasi
            return redirect()->to('/auth');
        }

        $dokumenModel = new DocumentModel();
        $pengetahuanModel = new PengetahuanModel();
        $materiModel = new MateriModel();

        // Misalkan Anda mendapatkan id_user dari session
        // $id_user = session()->get('users_id');

        // Menyiapkan data yang akan dikirim ke view
        $data = [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'dataUsers' => $this->userModel->getAllUsersData(),
            'total_users' => $this->userModel->countUsers(),
            'total_pengetahuan' => $this->pengetahuanModel->countPengetahuan(),
            'total_document' => $this->dokumenModel->countDocument(),
            'total_materi' => $this->materiModel->countMateri(),
            'materi' => json_encode($this->formatData($this->materiModel->getMonthlyCounts())),
            'pengetahuan' => json_encode($this->formatData($this->pengetahuanModel->getMonthlyCounts())),
            'dokumen' => json_encode($this->formatData($this->dokumenModel->getMonthlyCounts())),
            'nama_lengkap' => session()->get('users_nama_lengkap'),
            'level' => session()->get('users_level'),
        ];

        $data['materi'] = $data['materi'] ?? [];
        $data['pengetahuan'] = $data['pengetahuan'] ?? [];
        $data['dokumen'] = $data['dokumen'] ?? [];

        // Tampilkan halaman dashboard
        return view('admin/v_dashboard', $data);
    }


    private function formatData($data)
    {
        $formattedData = array_fill(1, 12, 0); // initialize array with 12 months

        foreach ($data as $entry) {
            $formattedData[(int)$entry['month']] = $entry['count'];
        }

        return array_values($formattedData); // return values as array

        // $formattedData = array_fill(0, 12, 0);
        // foreach ($data as $item) {
        //     $formattedData[$item->month - 1] = $item->count;
        // }
        // return $formattedData;
    }
}
