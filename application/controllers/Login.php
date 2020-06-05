<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('m_user');
    }
    public function index(){
        if(!$this->session->has_userdata('sesilogin')){
            $data['title'] = "Login";
            $this->load->view('templates/header',$data);
            $this->load->view('v_login');
            $this->load->view('templates/footer');
        }else{
            $cek['user']= $this->session->all_userdata();
            if($cek['user']['sesilogin']['id_position'] == 1){
                redirect('gmhome/');
            }else if($cek['user']['sesilogin']['id_position'] == 2){
                redirect('svmhome/');
            }else if($cek['user']['sesilogin']['id_position'] == 3){
                redirect('managerhome/');
            }else if($cek['user']['sesilogin']['id_position'] == 4){
                redirect('sweeperhome/');
            }else{
                redirect('/');
                exit;
            }
        }

    }
    public function signin(){
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        if($this->form_validation->run() == false){
            redirect('login/');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('users',array('username'=>$username))->row_array();
            if ($user['username']===$username && $user['password']===$password){
                $lguser = $this->m_user->getall($user['id_user']);
                $data['sesilogin']=[
                    'id_user' => $lguser['id_user'],
                    'fullname' => $lguser['fullname'],
                    'department' => $lguser['nama_department'],
                    'id_position' => $lguser['id_position'],
                    'jabatan' => $lguser['nama_position']                    
                ];
                $this->session->set_userdata($data);
                switch ($lguser['id_position']) {
                    case 1:
                        redirect('gmhome/',$data);
                        break;
                    case 2:
                        redirect('svmhome/',$data);
                        break;
                    case 3:
                        redirect('managerhome/',$data);
                        break;
                    case 4:
                        redirect('sweeperhome/',$data);
                        break;
                }
            }else{
                redirect('login/signin');
            }
        }

    }
    public function logout(){
        $array_items = array('sesilogin');
        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('flash','Anda Berhasil Logout ! :)');
		redirect('/');
    }
}