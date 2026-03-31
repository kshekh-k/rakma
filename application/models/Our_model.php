<?php
class Our_model extends CI_Model {

    public function count_all_members($search='')
        {
                $this->db->select('users.first_name , users.middle_name, users.last_name , users.post_name');
                 $this->db->select('post_district.name as office_district');
              $this->db->select('service.name as service_category');
                if(!empty($search))
                {

                        $name =  explode(' ', $search['name']);
                       if (isset($name[0])) {
    $this->db->group_start();  // Start a group of conditions
    $this->db->like('first_name', $name[0]);
    $this->db->or_like('middle_name', $name[0]);
    $this->db->or_like('last_name', $name[0]);
    $this->db->group_end();  // End the group of conditions
}

if (isset($name[1])) {
    $this->db->group_start();  // Start another group of conditions
    $this->db->like('first_name', $name[1]);
    $this->db->or_like('middle_name', $name[1]);
    $this->db->or_like('last_name', $name[1]);
    $this->db->group_end();  // End the group of conditions
}

if (isset($name[2])) {
    $this->db->group_start();  // Start another group of conditions
    $this->db->like('first_name', $name[2]);
    $this->db->or_like('middle_name', $name[2]);
    $this->db->or_like('last_name', $name[2]);
    $this->db->group_end();  // End the group of conditions
}

                        if (isset($search['post_name']) && !empty($search['post_name'])) {
                               $this->db->like('post_name' , $search['post_name']);
                        }

                        if (isset($search['post_distric']) && !empty($search['post_distric'])) {

                               $this->db->like('office_district' , $search['post_distric'] , 'none');
                        }
                       
                }
                $this->db->where('users.role','User');
               // $this->db->where('users.verify','1');

                    // $this->db->where('users.verify !=', '2');
                 //$this->db->where('user_membership.type !=','Lifetime');

            $this->db->where_in('user_membership.type', ['Join','Upgrade']);

            $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
            $this->db->join('service', 'service.id = users.service_category', 'left');
            $this->db->join('user_membership', 'user_membership.user_id = users.id');
            $this->db->from('users');

                $query = $this->db->get();
                return  $query->num_rows();
        }

         public function get_all_members($search='' , $limit , $offset)
        {
                $this->db->select('users.first_name , users.middle_name, users.last_name , users.post_name,');
                $this->db->select('post_district.name as office_district');
                $this->db->select('service.name as service_category');

               $this->db->where('users.role' , 'User');
              //   $this->db->where('users.verify','1');


              //  $this->db->where('users.verify !=', '2');
               //  $this->db->where('user_membership.type !=','Lifetime');
                  $this->db->where_in('user_membership.type', ['Join','Upgrade']);

                if(!empty($search))
                {
                        $name =  explode(' ', $search['name']);
                        if (isset($name[0])) {
                            $this->db->group_start();  // Start a group of conditions
                            $this->db->like('first_name', $name[0]);
                            $this->db->or_like('middle_name', $name[0]);
                            $this->db->or_like('last_name', $name[0]);
                            $this->db->group_end();  // End the group of conditions
                        }

                        if (isset($name[1])) {
                            $this->db->group_start();  // Start another group of conditions
                            $this->db->like('first_name', $name[1]);
                            $this->db->or_like('middle_name', $name[1]);
                            $this->db->or_like('last_name', $name[1]);
                            $this->db->group_end();  // End the group of conditions
                        }

                        if (isset($name[2])) {
                            $this->db->group_start();  // Start another group of conditions
                            $this->db->like('first_name', $name[2]);
                            $this->db->or_like('middle_name', $name[2]);
                            $this->db->or_like('last_name', $name[2]);
                            $this->db->group_end();  // End the group of conditions
                        }


                         if (isset($search['post_name']) && !empty($search['post_name'])) {
                               $this->db->like('post_name' , $search['post_name']);
                        }

                        if (isset($search['post_distric']) && !empty($search['post_distric'])) {
                               $this->db->like('office_district' , $search['post_distric'] , 'none');
                        }
                       
                }
             
                $this->db->from('users');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                ///$this->db->join('user_membership', 'user_membership.id = users.membership_id', 'right');
                $this->db->join('user_membership', 'user_membership.user_id = users.id');
                 $this->db->limit($limit , $offset);
                $this->db->order_by('users.id',  'DESC'); 
                $query = $this->db->get();
                return $query->result_array();
        }


         public function get_all_pwemanentmembers()
        {
                $this->db->select('users.first_name , users.middle_name, users.last_name , users.post_name,');
                $this->db->select('post_district.name as office_district');
                $this->db->select('service.name as service_category');
                $this->db->select('user_membership.type as membership_type');

                $this->db->where('users.role','user');
                $this->db->where('user_membership.type','Lifetime');
                 $this->db->where('users.verify','1');
                 
                 $this->db->from('users');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.user_id = users.id');
               // $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                // $this->db->limit($limit , $offset);
                $this->db->order_by('users.id',  'DESC'); 
                $query = $this->db->get();

               // echo '<pre>'; print_r($query->result_array()); die;
                return $query->result_array();
        }

}