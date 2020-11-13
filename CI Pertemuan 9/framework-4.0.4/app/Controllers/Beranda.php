<?php
namespace App\Controllers;
use App\Models\Pengguna_Model;

class Beranda extends BaseController {
    public function __construct(){
        $this->session = \Config\Services::session();
    }

    public function index() {
        $data['session']= $this->session->getFlashdata('response');
        $data['isLogin']= $this->session->get('username');
        //echo view('header_v');
        echo view('beranda_v',$data);
        //echo view('footer_v');
    }
    public function login(){
        $pengguna_model= new Pengguna_Model();
        $where=[
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
        $pengguna_model->where($where)->findAll();
        if (!empty($data)) {
            $this->session = set('username',$this->request->getPost('username'));
            $this->session = setFlashdata('response',['status'=> 1,'message'=> 'Berhasil Login']);
                        
        }
        else{
            $this->session = setFlashdata('response',['status'=> 0,'message'=> 'Gagal Login']);
        }
        return redirect()->to(site_url('Beranda'));
    }
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('Beranda'));
    }
}
?>