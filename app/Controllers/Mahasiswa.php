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
        $model = new MahasiswaModel();
    
        // Upload foto_diri
        $fotoDiri = $this->request->getFile('foto_diri');
        if ($fotoDiri->isValid() && !$fotoDiri->hasMoved()) {
            $fotoDiriName = $fotoDiri->getRandomName();
            $fotoDiri->move(FCPATH . 'uploads', $fotoDiriName);
        }
    
        // Upload foto_ktp
        $fotoKtp = $this->request->getFile('foto_ktp');
        if ($fotoKtp->isValid() && !$fotoKtp->hasMoved()) {
            $fotoKtpName = $fotoKtp->getRandomName();
            $fotoKtp->move(FCPATH . 'uploads', $fotoKtpName);
        }
    
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'foto_diri' => $fotoDiriName ?? null,
            'foto_ktp' => $fotoKtpName ?? null,
        ];
    
        $model->save($data);
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
    $model = new MahasiswaModel();
    $data = [
        'nim' => $this->request->getPost('nim'),
        'nama' => $this->request->getPost('nama'),
    ];

    // Upload foto_diri jika ada
    if ($this->request->getFile('foto_diri')->isValid()) {
        $fotoDiri = $this->request->getFile('foto_diri');
        $fotoDiriName = $fotoDiri->getRandomName();
        $fotoDiri->move(FCPATH . 'uploads', $fotoDiriName);
        $data['foto_diri'] = $fotoDiriName;
    }

    // Upload foto_ktp jika ada
    if ($this->request->getFile('foto_ktp')->isValid()) {
        $fotoKtp = $this->request->getFile('foto_ktp');
        $fotoKtpName = $fotoKtp->getRandomName();
        $fotoKtp->move(FCPATH . 'uploads', $fotoKtpName);
        $data['foto_ktp'] = $fotoKtpName;
    }

    $model->update($id, $data);
    return redirect()->to('/mahasiswa');
}



    public function delete($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);

        return redirect()->to('/mahasiswa');
    }
}
