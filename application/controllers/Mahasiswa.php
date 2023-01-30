<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_mahasiswa');
    }

    function index()
    {
        // $this->load->view('index');
        $this->load->view('demo');
    }

    ////////////////////////////////
    function tambahdemo(){

        $number_of_rows = count($_POST)-1;
        $name=$_POST['Name'];
        $phone=$_POST['Phone'];
        
        for($i=0; $i<$number_of_rows; $i++) {
            $data = array(
                'name'  => $name[$i], 
                'phone' => $phone[$i],
            );
            $this->model_mahasiswa->adddemo($data);
        }
        redirect('mahasiswa');
     }

    /////////////////////////////////////////

    function tampilMahasiswa()
    {
        $data['hasil']=$this->model_mahasiswa->TampilMahasiswa();
        $this->load->view('data-mahasiswa',$data);
    }

    function tambah()
    {
        $aksi=$this->input->post('aksi');
        $this->load->view('tambah',$aksi);
    }

    function edit()
    {
        $nim=$this->input->post('nim');
        $data['hasil']=$this->model_mahasiswa->Getnim($nim);
        $this->load->view('edit',$data);
    }
    
    function hapus()
    {
        $nim=$this->input->post('nim');
        $data['hasil']=$this->model_mahasiswa->Getnim($nim);
        $this->load->view('hapus',$data);
    }

    function simpanMahasiswa()
    {
        $data = array(
            'nim'=>$this->input->post('nim'),
            'nama'=>$this->input->post('nama'),
            'jurusan'=>$this->input->post('jurusan')
            );
            $this->db->insert('mahasiswa',$data);
    }

    function editMahasiswa()
    {
        $data = array(
            'nim'=>$this->input->post('nim_baru'),
            'nama'=>$this->input->post('nama'),
            'jurusan'=>$this->input->post('jurusan')
		);
        $nim = $this->input->post('nim_lama');
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa',$data);
    }
    
    function hapusMahasiswa()
    {
        $nim=$this->input->post('nim');
        $this->db->delete('mahasiswa',array('nim' => $nim));
    }
}
?>