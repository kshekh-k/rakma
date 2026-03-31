<?php
class Export_model extends CI_Model {

    


                     
      /*  public function getUsers($id = '') {

                $this->db->select('users.*');
                $this->db->select('r.phone as ref_phone , r.first_name as ref_first_name , r.middle_name as ref_middle_name , r.last_name as ref_last_name');
                $this->db->select('department.name as department_name');
                $this->db->select('service.name as service_name');
                $this->db->select('user_membership.price as m_price , user_membership.membership_status ,user_membership.id as user_membership_id');
                $this->db->select('membership.name as membership_name , membership.price as m_ship_price');
                $this->db->select('transaction.payment_status as payment_status , transaction.price as txn_amount , transaction.type');
                 $this->db->select('state.name as state');
                 $this->db->select('district.name as district');
                 $this->db->select('office_state.name as office_state');
                 $this->db->select('post_district.name as office_district');
                 if(!empty($id))
                {
                         $this->db->where('users.id' , $id);
                }
   
                $this->db->where('users.role' , 'User');
                $this->db->join('users as r', 'r.phone = users.ref_mobile', 'left');
                $this->db->join('department', 'department.id = users.name_of_diparment', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
                $this->db->join('transaction', 'transaction.payment_id = users.payment_id', 'left');
                $this->db->join('state', 'state.id = users.state', 'left');
                $this->db->join('district', 'district.id = users.district', 'left');
                $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');

                $this->db->from('users');

                $this->db->order_by('users.id',  'DESC'); 
                $query = $this->db->get();

                 if(empty($id))
                {
                        $result =  $query->result_array();
                }else
                {
                        $result =  $query->row_array();
                }


             
                return $result;

        }*/


        public function getAllUsersByCondtion($where = '' , $fields='',  $order = '' ,  $limit='') {

                if(!empty($fields))
                {       
                    $this->db->select($fields);     
                }else
                {
                   $this->db->select('users.*');     
                }
                
               
   
              
                $this->db->select('state.name as state');
                 $this->db->select('district.name as district');
                 $this->db->select('office_state.name as office_state');
                 $this->db->select('post_district.name as office_district');
                 $this->db->select('um.price as membership_price');
                 $this->db->select('m.name as membership_name');
                 if(!empty($where))
                        {
                                 $this->db->where($where);
                                // $date_condition = "create_at < '2023-01-01'";
                              //  $this->db->where($date_condition);
                        }
                        $this->db->where('users.role !=' , 'Admin');
                      
                        $this->db->join('department', 'department.id = users.name_of_diparment', 'left');
                        $this->db->join('service', 'service.id = users.service_category', 'left');
                        $this->db->join('state', 'state.id = users.state', 'left');
                        $this->db->join('district', 'district.id = users.district', 'left');
                        $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                        $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                        $this->db->join('user_membership as um', 'um.id = users.membership_id', 'left');
                        $this->db->join('membership as m', 'm.id = um.membership_id', 'left');
                        $this->db->from('users');

                
                if(!empty($order))
                {       
                    $this->db->order_by($order);     
                }else
                {
                     $this->db->order_by('users.id',  'DESC');    
                }
              
                $query = $this->db->get();
                $result =  $query->result_array();
                return $result;

        }


       /* public function getsingleUsersByCondtion($where) {

                $this->db->select('users.*');
                $this->db->select('r.phone as ref_phone , r.first_name as ref_first_name , r.middle_name as ref_middle_name , r.last_name as ref_last_name');
                $this->db->select('department.name as department_name');
                $this->db->select('service.name as service_name');
                $this->db->select('user_membership.price as m_price , user_membership.membership_status ,user_membership.id as user_membership_id');
                $this->db->select('membership.name as membership_name , membership.price as m_ship_price');
                $this->db->select('transaction.payment_status as payment_status , transaction.price as txn_amount , transaction.type');
                  $this->db->select('state.name as state');
                 $this->db->select('district.name as district');
                 $this->db->select('office_state.name as office_state');
                 $this->db->select('post_district.name as office_district');
                 if(!empty($where))
                {
                         $this->db->where($where);
                }
                  $this->db->where('users.role !=' , 'Admin');
                $this->db->join('users as r', 'r.phone = users.ref_mobile', 'left');
                $this->db->join('department', 'department.id = users.name_of_diparment', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
                $this->db->join('transaction', 'transaction.payment_id = users.payment_id', 'left');
                $this->db->join('state', 'state.id = users.state', 'left');
                $this->db->join('district', 'district.id = users.district', 'left');
                 $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->from('users');

                $this->db->order_by('users.id',  'DESC'); 
                $query = $this->db->get();
                $result =  $query->row_array();
                return $result;

        }
*/
      

}