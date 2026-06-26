<?php
class Our_model extends CI_Model {

    private function apply_member_list_filters($search = array())
    {
        if (empty($search)) {
            return;
        }

        $name = explode(' ', isset($search['name']) ? $search['name'] : '');

        if (isset($name[0]) && $name[0] !== '') {
            $this->db->group_start();
            $this->db->like('first_name', $name[0]);
            $this->db->or_like('middle_name', $name[0]);
            $this->db->or_like('last_name', $name[0]);
            $this->db->group_end();
        }

        if (isset($name[1]) && $name[1] !== '') {
            $this->db->group_start();
            $this->db->like('first_name', $name[1]);
            $this->db->or_like('middle_name', $name[1]);
            $this->db->or_like('last_name', $name[1]);
            $this->db->group_end();
        }

        if (isset($name[2]) && $name[2] !== '') {
            $this->db->group_start();
            $this->db->like('first_name', $name[2]);
            $this->db->or_like('middle_name', $name[2]);
            $this->db->or_like('last_name', $name[2]);
            $this->db->group_end();
        }

        if (isset($search['post_name']) && !empty($search['post_name'])) {
            $this->db->like('post_name', $search['post_name']);
        }

        if (isset($search['post_distric']) && !empty($search['post_distric'])) {
            $district = trim($search['post_distric']);
            $districtNormalized = strtolower(str_replace(array(' ', '-'), '', $district));
            $districtEscaped = $this->db->escape($districtNormalized);
            $this->db->where("(REPLACE(REPLACE(LOWER(post_district.name), '-', ''), ' ', '') = {$districtEscaped} OR REPLACE(REPLACE(LOWER(users.office_district), '-', ''), ' ', '') = {$districtEscaped})", null, false);
        }
    }

    public function count_all_members($search='')
        {
                $this->db->select('users.id, users.first_name , users.middle_name, users.last_name , users.post_name');
                 $this->db->select('COALESCE(post_district.name, users.office_district) as office_district', false);
              $this->db->select('service.name as service_category');
        $this->apply_member_list_filters($search);
                $this->db->where('users.role','User');
               // $this->db->where('users.verify','1');

                    // $this->db->where('users.verify !=', '2');
                 //$this->db->where('user_membership.type !=','Lifetime');

            $this->db->where_in('user_membership.type', ['Join','Upgrade']);
            $this->db->where('user_membership.membership_status', 'Active');

            $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
            $this->db->join('service', 'service.id = users.service_category', 'left');
            $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
            $this->db->from('users');
            $this->db->group_by('users.id');

                $query = $this->db->get();
                return  $query->num_rows();
        }

         public function get_all_members($search='' , $limit , $offset)
        {
                $this->db->select('users.id, users.first_name , users.middle_name, users.last_name , users.post_name,');
                $this->db->select('COALESCE(post_district.name, users.office_district) as office_district', false);
                $this->db->select('service.name as service_category');

               $this->db->where('users.role' , 'User');
              //   $this->db->where('users.verify','1');


              //  $this->db->where('users.verify !=', '2');
               //  $this->db->where('user_membership.type !=','Lifetime');
                  $this->db->where_in('user_membership.type', ['Join','Upgrade']);
                  $this->db->where('user_membership.membership_status', 'Active');

                $this->apply_member_list_filters($search);

                $this->db->from('users');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->group_by('users.id');
                 $this->db->limit($limit , $offset);
                $this->db->order_by('users.first_name', 'ASC');
                $this->db->order_by('users.middle_name', 'ASC');
                $this->db->order_by('users.last_name', 'ASC');
                $query = $this->db->get();
                return $query->result_array();
        }


             public function count_all_permanent_members($search='')
            {
                $this->db->select('users.id, users.first_name , users.middle_name, users.last_name , users.post_name');
                $this->db->select('COALESCE(post_district.name, users.office_district) as office_district', false);
                $this->db->select('service.name as service_category');
                $this->apply_member_list_filters($search);
                $this->db->where('users.role', 'User');
                $this->db->where('user_membership.type', 'Lifetime');
                $this->db->where('user_membership.membership_status', 'Active');
                $this->db->where('users.verify', '1');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->from('users');
                $this->db->group_by('users.id');

                $query = $this->db->get();
                return $query->num_rows();
            }


             public function get_all_permanent_members($search='' , $limit , $offset)
            {
                $this->db->select('users.id, users.first_name , users.middle_name, users.last_name , users.post_name,');
                $this->db->select('COALESCE(post_district.name, users.office_district) as office_district', false);
                $this->db->select('service.name as service_category');
                $this->db->where('users.role', 'User');
                $this->db->where('user_membership.type', 'Lifetime');
                $this->db->where('user_membership.membership_status', 'Active');
                $this->db->where('users.verify', '1');
                $this->apply_member_list_filters($search);
                $this->db->from('users');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->group_by('users.id');
                $this->db->limit($limit , $offset);
                $this->db->order_by('users.first_name', 'ASC');
                $this->db->order_by('users.middle_name', 'ASC');
                $this->db->order_by('users.last_name', 'ASC');
                $query = $this->db->get();
                return $query->result_array();
            }


         public function get_all_pwemanentmembers()
        {
                $this->db->select('users.first_name , users.middle_name, users.last_name , users.post_name,');
                $this->db->select('COALESCE(post_district.name, users.office_district) as office_district', false);
                $this->db->select('service.name as service_category');
                $this->db->select('user_membership.type as membership_type');

                $this->db->where('users.role','User');
                $this->db->where('user_membership.type','Lifetime');
                $this->db->where('user_membership.membership_status','Active');
                 $this->db->where('users.verify','1');

                 $this->db->from('users');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->order_by('users.first_name', 'ASC');
                $this->db->order_by('users.middle_name', 'ASC');
                $this->db->order_by('users.last_name', 'ASC');
                $query = $this->db->get();

                return $query->result_array();
        }

}