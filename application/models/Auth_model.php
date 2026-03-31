<?php
class Auth_model extends CI_Model {

    

        public function checkfrontuserlogin($email='' , $password='')
        {

                $this->db->select('*');
                $this->db->where('email' , $email);
                $this->db->where('password' , md5($password));
                $this->db->where('role' , 'Admin');
                $this->db->where('status' , '1');
                 $this->db->from('users');
                $query = $this->db->get();
         
                if ($query->row_array()) {
                        return $query->row_array();
                }else
                {
                        return false;
                }
               
        }




}