<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GmHome extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('m_user');
        $this->load->helper(array('form','url'));
        $this->load->library('upload');
    }
    public function index(){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | Home";
                $data['dashboard'] = "Dashboard GM";
                $data['trip'] = $this->db->get_where('travels',['id_user'=>$data['user']['sesilogin']['id_user']])->result_array();
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/V_gm',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        }
    }
    public function starttravel(){
        $this->form_validation->set_rules('lokasi','Lokasi','required|trim');
        $this->form_validation->set_rules('tanggal_start','Tanggal_Start','required|trim');
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('flash',"Isi form yang kosong");
            redirect('gmhome/');
        }else{
            $sesi = $this->session->all_userdata();
            $cek = $this->db->get_where('users',['id_user'=>$sesi['sesilogin']['id_user']])->row_array();
            if(!$cek['is_active']){
                $id_user = $sesi['sesilogin']['id_user'];
                $lokasi = $this->input->post('lokasi');
                $tanggal_mulai = $this->input->post('tanggal_start');
                $data = [
                    'id_user'=>$id_user,
                    'transportation' => 0,
                    'tollorparking' => 0,
                    'meals' => 0,
                    'supplies' => 0,
                    'voucher' => 0,
                    'gasoline' => 0,
                    'entertain' => 0,
                    'ticket' => 0,
                    'hotel' => 0,
                    'taxiinjkt' => 0,
                    'airporttrain' =>0,
                    'taxioutjkt' => 0,
                    'lunch' => 0,
                    'refund' => 0,
                    'lokasi'=>$lokasi,
                    'start_trip'=>$tanggal_mulai,
                    'end_trip'=>"0000-00-00",
                    'lokasi'=>$lokasi,
                    'start_trip'=>$tanggal_mulai,
                    'status'=>0,
                    'keterangan'=>"Trip telah dimulai"
                ];
                $this->m_user->addtravel($data);
                $this->m_user->updatestatus($sesi['sesilogin']['id_user']);
                $this->session->set_flashdata('flush',"Perjalanan telah dimulai");
                redirect('gmhome/');
            }else{
                $this->session->set_flashdata('flash',"Trip belum selesai");
                redirect('gmhome/');
            }
        }
    }
    public function perjalanan(){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | Tambah Data Perjalanan";
                $data['dashboard'] = "Dashboard GM";
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/Vgm_dataperjalanan',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        }
    }
    public function addperjalanan(){
        date_default_timezone_set("Asia/Jakarta");
        $sesi = $this->session->all_userdata();
        $cek = $this->db->get_where('travels',['id_user'=>$sesi['sesilogin']['id_user'],
                                            'end_trip'=>NULL,
                                            'status'=>0])->row_array();
        if($cek){
            $number = sizeof($_FILES['files']['tmp_name']);
            $files = $_FILES['files'];
            $config['upload_path']          = './assets/uploads_bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 6000;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $arr = [];
            for ($i=0; $i < $number;$i++){
                $_FILES['files']['name'] = $files['name'][$i];
                $config['file_name'] = date('d-m-y')."-".$files['name'][$i];
                $_FILES['files']['type'] = $files['type'][$i];
                $_FILES['files']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['files']['error'] = $files['error'][$i];
                $_FILES['files']['size'] = $files['size'][$i];
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('files')){
                    array_push($arr,"default.png");
                }else{

                    $nama_file = $this->upload->data('file_name');
                    array_push($arr,$nama_file);
                }
            }
            foreach ($arr as $item){
                $this->_resizefoto($item);
            }
            $data['upload'] = [
                'id_travel'=>$cek['id_travel'],
                'transportation'=>$this->input->post('transportation'),
                'fp_transportation'=>$arr[0],
                'tollorparking'=>$this->input->post('tollorparking'),
                'fp_tollorparking'=>$arr[1],
                'meals'=>$this->input->post('meals'),
                'fp_meals'=>$arr[2],
                'supplies'=>$this->input->post('supplies'),
                'fp_supplies'=>$arr[3],
                'voucher'=>$this->input->post('voucher'),
                'fp_voucher'=>$arr[4],
                'gasoline'=>$this->input->post('gasoline'),
                'fp_gasoline'=>$arr[5],
                'entertain'=>$this->input->post('entertain'),
                'fp_entertain'=>$arr[6],
                'ticket'=>$this->input->post('ticket'),
                'fp_ticket'=>$arr[7],
                'hotel'=>$this->input->post('hotel'),
                'fp_hotel'=>$arr[8],
                'taxiinjkt'=>$this->input->post('taxiinjkt'),
                'fp_taxiinjkt'=>$arr[9],
                'airporttrain'=>$this->input->post('airporttrain'),
                'fp_airporttrain'=>$arr[10],
                'taxioutjkt'=>$this->input->post('taxioutjkt'),
                'fp_taxioutjkt'=>$arr[11],
                'lunch'=>$this->input->post('lunch'),
                'fp_lunch'=>$arr[12],
                'refund'=>$this->input->post('refund'),
                'fp_refund'=>$arr[13],
                'submit_date'=>date('Y-m-d',time())
            ];
            $this->db->insert('detail_travels',$data['upload']);
            $this->session->set_flashdata('flush','Submit data berhasil !');
            redirect('gmhome/perjalanan');
        }else{
            $this->session->set_flashdata('flash','Belum memulai trip');
            redirect('gmhome/perjalanan');
        }
    }
    public function _resizefoto($filename){
        $config = [
                'image_library' => 'GD2',
                'source_image'  => './assets/uploads_bukti/'.$filename,
                'maintain_ratio'=> FALSE,
                'width'         => 160,
                'height'        => 80,
                'new_image'     => './assets/show_bukti/'.$filename
        ];
        $this->load->library('image_lib',$config);
        $this->image_lib->initialize($config);
        if(!$this->image_lib->resize()){
            return false;
        }else{
            $this->image_lib->clear();
        }
    }
    public function end_trip($idtrv){
        $sesi = $this->session->all_userdata();
        $cek = $this->db->get_where('users',["id_user"=>$sesi['sesilogin']['id_user']])->row_array();
        if($cek){
            $this->m_user->endtravelsvm($sesi['sesilogin']['id_user'],$idtrv);
            redirect('gmhome/history');
        }else{
            $this->session->set_flashdata('flash',"Anda belum memulai trip");
            redirect('gmhome/');
        }
    }
    public function history(){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | History Perjalanan";
                $data['dashboard'] = "Dashboard GM";
                $data['history'] = $this->db->get_where('travels',['id_user'=>$data['user']['sesilogin']['id_user']])->result_array();
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/Vgm_history',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        }       
    }
    public function detail_history($id){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | Detail History Perjalanan";
                $data['dashboard'] = "Dashboard GM";
                $data['trv'] = $this->db->get_where('travels',['id_travel'=>$id])->row_array();
                $data['hist'] = $this->db->get_where('detail_travels',['id_travel'=>$id])->result_array();
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/Vgm_detailhistory',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        }       
    }
    public function setting(){
        $this->form_validation->set_rules('password','Password','required|trim|matches[repassword]');
        $this->form_validation->set_rules('repassword','RePassword','required|trim|matches[password]');
        $data = $this->session->all_userdata();
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('flash','Password Gagal di Ubah');
            redirect('gmhome/');
        }else{
            $update = [
                'password'=> $this->input->post('password')
            ];
            $this->db->where('id_user',$data['sesilogin']['id_user']);
            $cek = $this->db->update('users',$update);
            if($cek){
                $this->session->set_flashdata('flush',"Password Berhasil di Ubah");
                redirect('gmhome/');
            }
        }
    }
    public function approval(){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | Approval";
                $data['dashboard'] = "Dashboard GM";
                $data['sweeper'] = $this->m_user->getapproval(1,3);
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/Vgm_approval',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        }       
    }
    public function detail_travel($id){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | Detail Travel";
                $data['dashboard'] = "Dashboard GM";
                $data['trv'] = $this->db->get_where('travels',['id_travel'=>$id])->row_array();
                $data['hist'] = $this->db->get_where('detail_travels',['id_travel'=>$id])->result_array();
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/Vgm_detailtravel',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        }       
    }
    public function approve($id){
        date_default_timezone_set("Asia/Jakarta");
        $sesi = $this->session->all_userdata();
        $cek = $this->db->get_where('travels',['id_travel'=>$id])->row_array();
        $posisi = $this->m_user->cekposisi($cek['id_user']);
            $data = [
                'status' => 4,
                'keterangan'=>$cek['keterangan'].","."Approved by ".$sesi['sesilogin']['fullname']." Tanggal ".date('d-m-yy')
            ];
            $this->db->where('id_travel',$id);
            $this->db->update('travels',$data);
        redirect('gmhome/approval');
    }
    public function reject($id){
        date_default_timezone_set("Asia/Jakarta");
        $sesi = $this->session->all_userdata();
        $data = [
            'status' => 0,
            'keterangan'=>"Rejected by ".$sesi['sesilogin']['fullname']." Tanggal ".date('d-m-yy')
        ];
        $this->db->where('id_travel',$id);
        $this->db->update('travels',$data);
        redirect('gmhome/approval');
    }
    public function user(){
        $data['user'] = $this->session->all_userdata();
        if($data['user']['sesilogin']){
            if($data['user']['sesilogin']['id_position'] == 1){
                $data['title'] = "GM | Tambah SPM";
                $data['dashboard'] = "Dashboard GM";
                $data['user'] = $this->m_user->getuser(4);
                $this->load->view('templates/header',$data);
                $this->load->view('Gm/Vgm_user',$data);
                $this->load->view('templates/footer');
            }else{
                $data['heading'] = "Halaman tidak dapat diakses";
                $data['message'] = " Mohon maaf akses ditolak";
                $this->load->view('errors/html/error_404',$data);
            }
        }else{
            redirect('/');
            exit;
        } 
    }
    public function addsweeper(){
        $this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('fullname','Fullname','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('department','Department','required|trim');
        $this->form_validation->set_rules('bank_acc','Bank_Acc','required|trim');
        if($this->form_validation->run() == false){
            redirect('gmhome/user');
        }else{
            if($this->input->post('department') === "BTF"){
                $id_department = 1;
            }elseif ($this->input->post('department') === "Property Renewal") {
                $id_department = 2;
            }
            $data = [
                'fullname'=> $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'bank_acc' => $this->input->post('bank_acc'),
                'id_department' => $id_department,
                'id_position' => 3,
                'is_active' =>0
            ];
            $this->db->insert('users',$data);
            redirect('gmhome/user','refresh');
        }
    }
    public function delsweeper($id){
        $this->db->delete('users',['id_user'=>$id]);
        redirect('gmhome/user');
    }
    public function editsweeper($id){
        $user = $this->db->get_where('users',['id_user' => $id]);
        if($this->input->post('department') === "BTF"){
            $id_department = 1;
        }elseif ($this->input->post('department') === "Property Renewal") {
            $id_department = 2;
        }
        $data = [
            'fullname'=> $this->input->post('fullname'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'bank_acc' => $this->input->post('bank_acc'),
            'id_department' => $id_department
        ];
        $this->db->where('id_user',$id);
        $this->db->update('users',$data);
        redirect('gmhome/user');
    }
    public function invoice($id){
        $this->load->library('pdfgenerator');
        $data['user'] = $this->session->all_userdata();
        $data['inv'] = $this->m_user->createinvoice($id);
        $html = $this->load->view('Gm/Invoice',$data,true);
        $this->pdfgenerator->generate($html,"expansereport-".$id);
    }
    public function hapus_detail($id){
        $this->db->delete('detail_travels',['id_detail'=>$id]);
        redirect('gmhome/history');
    }
    public function save_changes($idtrv){
        $trv = $this->db->get_where('travels',['id_travel'=>$idtrv])->row_array();
        $get = $this->db->get_where('detail_travels',['id_travel'=>$idtrv])->result_array();
        $iterasi = count($get);
        $transportation = 0;
        $tollorparking = 0;
        $meals = 0;
        $supplies = 0;
        $voucher = 0;
        $gasoline = 0;
        $entertain = 0;
        $ticket = 0;
        $hotel = 0;
        $taxiinjkt = 0;
        $airporttrain =0;
        $taxioutjkt = 0;
        $lunch = 0;
        $refund = 0;
        for ($i=0;$i < $iterasi; $i++){
            $transportation += $get[$i]['transportation'];
            $tollorparking += $get[$i]['tollorparking'];
            $meals += $get[$i]['meals'];
            $supplies += $get[$i]['supplies'];
            $voucher += $get[$i]['voucher'];
            $gasoline += $get[$i]['gasoline'];
            $entertain += $get[$i]['entertain'];
            $ticket += $get[$i]['ticket'];
            $hotel += $get[$i]['hotel'];
            $taxiinjkt += $get[$i]['taxiinjkt'];
            $airporttrain +=$get[$i]['airporttrain'];
            $taxioutjkt += $get[$i]['taxioutjkt'];
            $lunch += $get[$i]['lunch'];
            $refund += $get[$i]['refund'];
        }
        $data['update'] = [
                'transportation'=>$transportation,
                'tollorparking'=>$tollorparking,
                'meals'=>$meals,
                'supplies'=>$supplies,
                'voucher'=>$voucher,
                'gasoline'=>$gasoline,
                'entertain'=>$entertain,
                'ticket'=>$ticket,
                'hotel'=>$hotel,
                'taxiinjkt'=>$taxiinjkt,
                'airporttrain'=>$airporttrain,
                'taxioutjkt'=>$taxioutjkt,
                'lunch'=>$lunch,
                'refund'=>$refund
            ];
        $this->db->where('id_travel',$idtrv);
        $this->db->update('travels',$data['update']);
        redirect('gmhome/detail_history/'.$idtrv);
    }
    public function edit_detail($id){
        date_default_timezone_set("Asia/Jakarta");
        $sesi = $this->session->all_userdata();
        $number = sizeof($_FILES['files']['tmp_name']);
        $files = $_FILES['files'];
        $config['upload_path']          = './assets/uploads_bukti/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 6000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $arr = [];
        for ($i=0; $i < $number;$i++){
            $_FILES['files']['name'] = $files['name'][$i];
            $config['file_name'] = date('d-m-y')."-".$files['name'][$i];
            $_FILES['files']['type'] = $files['type'][$i];
            $_FILES['files']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['files']['error'] = $files['error'][$i];
            $_FILES['files']['size'] = $files['size'][$i];
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('files')){
                array_push($arr,"default.png");
            }else{

                $nama_file = $this->upload->data('file_name');
                array_push($arr,$nama_file);
            }
        }
        foreach ($arr as $item){
            $this->_resizefoto($item);
        }
        $data['upload'] = [
            'transportation'=>$this->input->post('transportation'),
            'fp_transportation'=>$arr[0],
            'tollorparking'=>$this->input->post('tollorparking'),
            'fp_tollorparking'=>$arr[1],
            'meals'=>$this->input->post('meals'),
            'fp_meals'=>$arr[2],
            'supplies'=>$this->input->post('supplies'),
            'fp_supplies'=>$arr[3],
            'voucher'=>$this->input->post('voucher'),
            'fp_voucher'=>$arr[4],
            'gasoline'=>$this->input->post('gasoline'),
            'fp_gasoline'=>$arr[5],
            'entertain'=>$this->input->post('entertain'),
            'fp_entertain'=>$arr[6],
            'ticket'=>$this->input->post('ticket'),
            'fp_ticket'=>$arr[7],
            'hotel'=>$this->input->post('hotel'),
            'fp_hotel'=>$arr[8],
            'taxiinjkt'=>$this->input->post('taxiinjkt'),
            'fp_taxiinjkt'=>$arr[9],
            'airporttrain'=>$this->input->post('airporttrain'),
            'fp_airporttrain'=>$arr[10],
            'taxioutjkt'=>$this->input->post('taxioutjkt'),
            'fp_taxioutjkt'=>$arr[11],
            'lunch'=>$this->input->post('lunch'),
            'fp_lunch'=>$arr[12],
            'refund'=>$this->input->post('refund'),
            'fp_refund'=>$arr[13]
        ];
        $this->db->where('id_detail',$id);
        $this->db->update('detail_travels',$data['upload']);
        $idtrv = $this->db->get_where('detail_travels',['id_detail'=> $id])->row_array();
        redirect('gmhome/detail_history/'.$idtrv['id_travel']);
    }
    public function hapustravel($id){
        $this->db->delete('travels',['id_travel'=>$id]);
        redirect('gmhome/');
    }
}