<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    public function getall($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('departments','users.id_department = departments.id_department');
        $this->db->join('positions','users.id_position = positions.id_position');
        $this->db->where('id_user',$id);
        return $this->db->get()->row_array();
    }
    public function addtravel($data){
        return $this->db->insert('travels',$data);
    }
    public function endtravel($id,$idtrv){
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'end_trip' => date('Y-m-d',time()),
            'status' => 1,
            "keterangan" => "Trip telah selesai"
        ];
        $dataj = [
            'is_active'=>0
        ];
        $this->db->where('id_travel',$idtrv);
        $this->db->update('travels',$data);
        $this->db->where('id_user',$id);
        $this->db->update('users',$dataj);
    }
    public function endtravelm($id,$idtrv){
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'end_trip' => date('Y-m-d',time()),
            'status' => 2,
            "keterangan" => "Trip telah selesai"
        ];
        $dataj = [
            'is_active'=>0
        ];
        $this->db->where('id_travel',$idtrv);
        $this->db->update('travels',$data);
        $this->db->where('id_user',$id);
        $this->db->update('users',$dataj);
    }
    public function endtravelsvm($id,$idtrv){
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'end_trip' => date('Y-m-d',time()),
            'status' => 3,
            "keterangan" => "Trip telah selesai"
        ];
        $dataj = [
            'is_active'=>0
        ];
        $this->db->where('id_travel',$idtrv);
        $this->db->update('travels',$data);
        $this->db->where('id_user',$id);
        $this->db->update('users',$dataj);
    }
    public function updatestatus($id){
        $data =[
            "is_active"=>1
        ];
        $this->db->where('id_user',$id);
        return $this->db->update('users',$data);
    }
    public function getapproval($id,$status){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('departments','users.id_department=departments.id_department');
        $this->db->join('travels','users.id_user=travels.id_user');
        $this->db->where('id_position >',$id);
        $this->db->where('travels.status',$status);
        return $this->db->get()->result_array();
    }
    public function getapprovalsvm($id,$id2,$status){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('departments','users.id_department=departments.id_department');
        $this->db->join('travels','users.id_user=travels.id_user');
        $this->db->where('id_position',$id);
        $this->db->where('id_position',$id2);
        $this->db->where('travels.status',$status);
        return $this->db->get()->result_array();
    }
    public function getuser($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('departments','users.id_department=departments.id_department');
        $this->db->join('positions','users.id_position=positions.id_position');
        $this->db->where('users.id_position ',$id);
        return $this->db->get()->result_array();
    }
    public function createinvoice($id){
        $this->db->select('*');
        $this->db->from('travels');
        $this->db->join('users','travels.id_user=users.id_user');
        $this->db->join('departments','departments.id_department=users.id_department');
        $this->db->where('id_travel',$id);
        return $this->db->get()->row_array();
    }
    public function cekposisi($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user',$id);
        return $this->db->get()->row_array();
    }
}