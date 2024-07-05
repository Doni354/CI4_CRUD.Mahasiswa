<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Mahasiswa extends Controller
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll();
        
        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }
    public function store()
    {
        $mahasiswaModel = new MahasiswaModel();

        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');

        $fotoDiri = $this->request->getFile('foto_diri');
        $fotoKtp = $this->request->getFile('foto_ktp');

        if ($fotoDiri->isValid() && !$fotoDiri->hasMoved()) {
            $fotoDiriName = $fotoDiri->getRandomName();
            $fotoDiri->move('uploads', $fotoDiriName);
        }

        if ($fotoKtp->isValid() && !$fotoKtp->hasMoved()) {
            $fotoKtpName = $fotoKtp->getRandomName();
            $fotoKtp->move('uploads', $fotoKtpName);
        }

        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'foto_diri' => $fotoDiriName ?? null,
            'foto_ktp' => $fotoKtpName ?? null,
        ];

        $mahasiswaModel->insert($data);

        return redirect()->to('/mahasiswa');
    }
    
    public function edit($id)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->find($id);

        return view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        $mahasiswaModel = new MahasiswaModel();

        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');

        $fotoDiri = $this->request->getFile('foto_diri');
        $fotoKtp = $this->request->getFile('foto_ktp');

        $data = [
            'nim' => $nim,
            'nama' => $nama,
        ];

        if ($fotoDiri->isValid() && !$fotoDiri->hasMoved()) {
            $fotoDiriName = $fotoDiri->getRandomName();
            $fotoDiri->move('uploads', $fotoDiriName);
            $data['foto_diri'] = $fotoDiriName;
        }

        if ($fotoKtp->isValid() && !$fotoKtp->hasMoved()) {
            $fotoKtpName = $fotoKtp->getRandomName();
            $fotoKtp->move('uploads', $fotoKtpName);
            $data['foto_ktp'] = $fotoKtpName;
        }

        $mahasiswaModel->update($id, $data);

        return redirect()->to('/mahasiswa');
    }



    public function delete($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);

        return redirect()->to('/mahasiswa');
    }
}
