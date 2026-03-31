<?php
class Common_model extends CI_Model {

    


         
         public function getlifetimeUsers($id = '') {

                $this->db->select('users.*');
                $this->db->select('r.phone as ref_phone , r.first_name as ref_first_name , r.middle_name as ref_middle_name , r.last_name as ref_last_name');
                $this->db->select('department.name as department_name');
                $this->db->select('service.name as service_name');
                $this->db->select('user_membership.price as m_price , user_membership.membership_status ,user_membership.id as user_membership_id , user_membership.type as m_type');
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
    
                 $this->db->where('users.role','user');
                $this->db->where('user_membership.type','Lifetime');
                // $this->db->where('users.verify','1');
             



                $this->db->join('users as r', 'r.phone = users.ref_mobile', 'left');
                $this->db->join('department', 'department.id = users.name_of_diparment', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.user_id = users.id', 'left');
               // $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
                $this->db->join('transaction', 'transaction.payment_id = users.payment_id', 'left');
                $this->db->join('state', 'state.id = users.state', 'left');
                $this->db->join('district', 'district.id = users.district', 'left');
                $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');

                $this->db->from('users');

                $this->db->order_by('users.id',  'DESC'); 
               

                 if(empty($id))
                {
                      
                       $query = $this->db->get();
                        $result =  $query->result_array();
                }else
                {
                     $query = $this->db->get();
                        $result =  $query->row_array();
                }


             
                return $result;

        }

        public function get_users($limit, $offset) {
           

               $this->db->select('users.*');
                $this->db->select('r.phone as ref_phone , r.first_name as ref_first_name , r.middle_name as ref_middle_name , r.last_name as ref_last_name');
                $this->db->select('department.name as department_name');
                $this->db->select('service.name as service_name');
                $this->db->select('user_membership.price as m_price , user_membership.membership_status ,user_membership.id as user_membership_id , user_membership.type as m_type');
                $this->db->select('membership.name as membership_name , membership.price as m_ship_price');
               // $this->db->select('transaction.payment_status as payment_status , transaction.price as txn_amount , transaction.type');
                 // $this->db->select('state.name as state');
                 // $this->db->select('district.name as district');
                 // $this->db->select('office_state.name as office_state');
                 // $this->db->select('post_district.name as office_district');
                 
                $this->db->where('users.role' , 'User');
                $this->db->join('users as r', 'r.phone = users.ref_mobile', 'left');
                $this->db->join('department', 'department.id = users.name_of_diparment', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
              //  $this->db->join('transaction', 'transaction.payment_id = users.payment_id', 'left');
                // $this->db->join('state', 'state.id = users.state', 'left');
                // $this->db->join('district', 'district.id = users.district', 'left');
                // $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                // $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');

                $this->db->from('users');

                $this->db->order_by('users.id',  'DESC'); 
                 $this->db->limit($limit, $offset);
                $query = $this->db->get();



                     $result =  $query->result_array();
                return $result;

        }

        public function count_users() {
            return $this->db->where('users.role' , 'User')->count_all_results('users');
        }


        public function getUsers($id = '') {

                $this->db->select('users.*');
                $this->db->select('r.phone as ref_phone , r.first_name as ref_first_name , r.middle_name as ref_middle_name , r.last_name as ref_last_name');
                $this->db->select('department.name as department_name');
                $this->db->select('service.name as service_name');
                $this->db->select('user_membership.price as m_price , user_membership.membership_status ,user_membership.id as user_membership_id , user_membership.type as m_type');
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
               // $this->db->where('user_membership.type !=', 'Lifetime');
                $this->db->where_in('user_membership.type', ['Join','Upgrade']);

                $this->db->join('users as r', 'r.phone = users.ref_mobile', 'left');
                $this->db->join('department', 'department.id = users.name_of_diparment', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                $this->db->join('user_membership', 'user_membership.user_id = users.id');
                //$this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
                $this->db->join('transaction', 'transaction.payment_id = users.payment_id', 'left');
                $this->db->join('state', 'state.id = users.state', 'left');
                $this->db->join('district', 'district.id = users.district', 'left');
                $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');

                $this->db->from('users');

                $this->db->order_by('users.id',  'DESC'); 
               

                 if(empty($id))
                {
                      //$this->db->limit(100); 
                       $query = $this->db->get();
                        $result =  $query->result_array();
                }else
                {
                     $query = $this->db->get();
                        $result =  $query->row_array();
                }


             
                return $result;

        }


        public function getAllUsersByCondtion($where) {

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
                $result =  $query->result_array();
                return $result;

        }


        public function getsingleUsersByCondtion($where) {

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

        public function getAllRecords($table='' , $order_by = '' , $limit = '')
        {
                $this->db->select('*');
                $this->db->from($table);

                if (!empty($order_by) && is_array($order_by)) {

                      $this->db->order_by($order_by);

                }elseif(!empty($order_by))
                {
                    $this->db->order_by('id',$order_by);  
                    
                }else
                {
                    $this->db->order_by('id','DESC');  
                }


                if (!empty($limit)) {

                        $this->db->limit($limit);
                }
               
                $query = $this->db->get();
                return $query->result_array();
        }



        public function getAllRecordsByFieldName($fieldname = '' , $table='' , $order_by = '' , $limit = '' , $offset='')
        {
               /* $this->db->reconnect();*/
                $this->db->select('*');

                $this->db->where($fieldname);

                $this->db->from($table);

                if (!empty($order_by) && is_array($order_by)) {

                      $this->db->order_by($order_by);

                }elseif(!empty($order_by))
                {

                    $this->db->order_by('id' , $order_by);  
                    
                }else
                {
                    $this->db->order_by('id','DESC');  
                }

                if (!empty($limit) && !empty($offset)) {
                        $this->db->limit($limit , $offset);
                }elseif(!empty($limit))
                {
                        $this->db->limit($limit);       
                }else
                {
                        $skip = '';
                }
                
                $query = $this->db->get();
                return $query->result_array();
        }

  public function countrecords($fieldname = '' , $table='')
        {
                $this->db->select('*');

                $this->db->where($fieldname);

                $this->db->from($table);

                 $query = $this->db->get();
                return $query->num_rows();
        }

        public function getSingleRecordById($id="" , $table='')
        {
                $this->db->select('*');
                $this->db->where('id' , $id);
                $this->db->from($table);
                $query = $this->db->get();
                return $query->row_array();
        }




        public function getSingleRecordByFieldName($where = '', $table='')
        {
                $this->db->select('*');
                $this->db->where($where);
                $this->db->from($table);
                $query = $this->db->get();
                return $query->row_array();
        }






        public function insert($table,$data)
        {
                $this->db->insert($table, $data);
                 return $this->db->insert_id();
        }

        public function update($id='' , $data = '' , $table='')
        {
                $this->db->update($table, $data, 'id='.$id);
                  return  $this->db->affected_rows();
        }


        public function updateByColumn($where , $data = '' , $table='')
        {
                $this->db->update($table, $data, $where);
                  return  $this->db->affected_rows();
        }


        public function deleteRecordById($id , $table) {
                $this->db->where('id', $id);
                $this->db->delete($table);
                return true;

        }

        public function deleteRecordByColumnName($columnName , $table) {
                $this->db->where($columnName);
                $this->db->delete($table);
                 return  $this->db->affected_rows();
              

        }






        /* Transaction List */
        public function transaction() {

                $this->db->select('transaction.*');
                $this->db->select('users.first_name , users.middle_name , users.last_name , users.phone');
                $this->db->join('users', 'users.id = transaction.user_id', 'left');
                $this->db->from('transaction');
                $this->db->order_by('transaction.id',  'DESC'); 
                $query = $this->db->get();
                return $query->result_array();

        }


    
        public function getallusermembership($id='') {

                $this->db->select('user_membership.*');
                $this->db->select('membership.name');
                $this->db->where('user_membership.user_id' , $id);
                $this->db->from('user_membership');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
                $this->db->order_by('user_membership.id',  'ASC'); 
                $query = $this->db->get();
                return $query->result_array();

        }
        /* Gallery List */
        public function gallery($per_page , $page) {

                $this->db->select('gallery.*');
                $this->db->where('status', '1');
                $this->db->from('gallery');
                $this->db->limit($per_page , $page);
                $this->db->order_by('gallery.id',  'DESC'); 
                $query = $this->db->get();

               
                $result = $query->result_array();

               

                $output = array();

                if ($result) {

                        foreach ($result as $key => $value) {
                                $this->db->select('gallery_image.*');
                                $this->db->where('gallery_id', $value['id']);
                                $this->db->from('gallery_image');
                                $this->db->limit(3); 
                                $this->db->order_by('gallery_image.id',  'ASC'); 
                                $GalleryImagesquery = $this->db->get();
                                $value['images']  = $GalleryImagesquery->result_array();

                                $output[] = $value;

                               
                               

                        }

                        

                        return $output; 
                        
                }else
                {
                        return $result;
                }

        }






        /* memberlist  List */
        public function memberlist($id = '' , $limit='') {

                $this->db->select('committee_member.*');
                $this->db->select('users.first_name , users.middle_name , users.last_name , users.phone , users.email , users.image as profile');
                $this->db->select('committee.title , committee.description , committee.id as committee_id');
                $this->db->select('GROUP_CONCAT(post_type.name SEPARATOR ",") as post_name');
                $this->db->where('committee_member.c_id' , $id);
                $this->db->join('users', 'users.id = committee_member.user_id', 'left');
                $this->db->join('committee', 'committee.id = committee_member.c_id', 'left');
                $this->db->join('post_type', 'post_type.id = committee_member.post_id', 'left');
                $this->db->from('committee_member');
                $this->db->group_by('committee_member.user_id');
                if(!empty($limit))
                {
                     $this->db->limit($limit);    
                }
               
                $this->db->order_by('committee_member.sort',  'ASC'); 
                $query = $this->db->get();
              
                return $query->result_array();

        }

       


        public function doantion_info() {

                $output  = array();
                $this->db->select_sum('price');
                $this->db->from('donation');
                $query = $this->db->get();
                $result =  $query->row_array();
                $output['total_donation'] =  $result['price'];

              
                $this->db->select_max('price');
                $this->db->from('donation');
                $query = $this->db->get();
                $result =  $query->row_array();
                $output['max_donation'] =  $result['price'];

                 $result = $this->db->select_sum('price')->where('MONTH(create_at)', date('m'))
              ->where('YEAR(create_at)', date('Y'))->get("donation")->row_array();
              $output['this_month'] =  $result['price'];

                $result = $this->db->select_sum('price')->where('YEAR(create_at)', date('Y'))->get("donation")->row_array();
                $output['this_year'] =  $result['price'];



                
                return $output;

        }


                public function txn_info() {

                $output  = array();
                $this->db->select_sum('price');
                $this->db->from('transaction');
                $query = $this->db->get();
                $result =  $query->row_array();
                $output['total_txn'] =  $result['price'];

              
                $this->db->select_sum('price');
                $this->db->where('payment_status' , 'Authorized');
                $this->db->from('transaction');
                $query = $this->db->get();
                $result =  $query->row_array();
                $output['total_pending_txn'] =  $result['price'];


              
                $this->db->select_sum('price');
                $this->db->where('payment_status' , 'Complete');
                $this->db->from('transaction');
                $query = $this->db->get();
                $result =  $query->row_array();
                $output['total_complete_txn'] =  $result['price'];

               
                $this->db->select_sum('price');
                $this->db->where('payment_status' , 'Refunded');
                $this->db->from('transaction');
                $query = $this->db->get();
                $result =  $query->row_array();
                $output['total_refund_txn'] =  $result['price'];

              
                
/*
                 $result = $this->db->select_sum('price')->where('MONTH(create_at)', date('m'))
              ->where('YEAR(create_at)', date('Y'))->get("donation")->row_array();
              $output['this_month'] =  $result['price'];

                $result = $this->db->select_sum('price')->where('YEAR(create_at)', date('Y'))->get("donation")->row_array();
                $output['this_year'] =  $result['price'];*/



                
                return $output;

        }



            public function count_all_members($search='')
        {
                $this->db->select('users.*');
                 $this->db->select('post_district.name as office_district');
              $this->db->select('service.name as service_category');
                if(!empty($search))
                {
                       /* $name =  explode(' ', $search['name']);
                        if (isset($name[0])) {
                               $this->db->like('first_name' , $name[0]);
                        }
                        if (isset($name[1])) {
                               $this->db->like('middle_name' , $name[1]);
                        }
                        if (isset($name[2])) {
                               $this->db->like('last_name' , $name[2]);
                        }*/
                        if (isset($search['district']) && !empty($search['district'])) {
                               $this->db->where('users.district' , $search['district']);
                        }

                         if (isset($search['post_type']) && !empty($search['post_type'])) {
                               $this->db->where('users.post_type' , $search['post_type']);
                        }

                         if (isset($search['service']) && !empty($search['service'])) {
                               $this->db->where('users.service_status' , $search['service']);
                        }

                        if (isset($search['verify']) && !empty($search['verify'])) {
                               $this->db->where('users.verify' , $search['verify']);
                        }

                         if (isset($search['post_district']) && !empty($search['post_district'])) {
                               $this->db->where('users.office_district' , $search['post_district']);
                        }

                        

                         if (isset($search['ref_number']) && !empty($search['ref_number'])) {
                               $this->db->where('users.ref_mobile' , $search['ref_number']);
                        }

                         if (isset($search['post_name']) && !empty($search['post_name'])) {
                               $this->db->like('users.post_name' , $search['post_name']);
                        }

                     /*   if (isset($search['post_distric']) && !empty($search['post_distric'])) {
                               $this->db->like('office_district' , $search['post_distric'] , 'none');
                        }*/
                       
                }
                $this->db->where('role','user');
                $this->db->from('users');
                 $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                  $this->db->join('service', 'service.id = users.service_category', 'left');
                $query = $this->db->get();
                return $query->num_rows();
        }



        public function get_all_members($search='' , $limit , $offset) {

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
                 if(!empty($search))
                {
                       /* $name =  explode(' ', $search['name']);
                        if (isset($name[0])) {
                               $this->db->like('first_name' , $name[0]);
                        }
                        if (isset($name[1])) {
                               $this->db->like('middle_name' , $name[1]);
                        }
                        if (isset($name[2])) {
                               $this->db->like('last_name' , $name[2]);
                        }*/
                         if (isset($search['district']) && !empty($search['district'])) {
                               $this->db->where('users.district' , $search['district']);
                        }

                         if (isset($search['post_type']) && !empty($search['post_type'])) {
                               $this->db->where('users.post_type' , $search['post_type']);
                        }

                         if (isset($search['service']) && !empty($search['service'])) {
                               $this->db->where('users.service_status' , $search['service']);
                        }

                        if (isset($search['verify']) && !empty($search['verify'])) {
                               $this->db->where('users.verify' , $search['verify']);
                        }

                         if (isset($search['post_district']) && !empty($search['post_district'])) {
                               $this->db->where('users.office_district' , $search['post_district']);
                        }

                        

                         if (isset($search['ref_number']) && !empty($search['ref_number'])) {
                               $this->db->where('users.ref_mobile' , $search['ref_number']);
                        }

                         if (isset($search['post_name']) && !empty($search['post_name'])) {
                               $this->db->like('users.post_name' , $search['post_name']);
                        }

                       
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
                  $this->db->limit($limit , $offset);
                $this->db->order_by('users.id',  'DESC'); 
                $query = $this->db->get();
                 $result =  $query->result_array();
                  return $result;

        }



  public function get_list_by_cat() {
        $this->db->select('list.*');
        $this->db->select('district.name as cat');
        $this->db->from('list');
        $this->db->join('district', 'district.id = list.district', 'left');
        $this->db->group_by('list.district'); 
        $this->db->order_by('list.id',  'DESC'); 
        $query = $this->db->get();
        $result =  $query->result_array();
        return $result;

  }











            public function getUsersforPDF($id = '') {

                $this->db->select('users.*');
                $this->db->select('r.phone as ref_phone , r.first_name as ref_first_name , r.middle_name as ref_middle_name , r.last_name as ref_last_name');
                $this->db->select('department.name as department_name');
                $this->db->select('service.name as service_name');
                $this->db->select('user_membership.price as m_price , user_membership.membership_status ,user_membership.id as user_membership_id , user_membership.type as m_type');
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
                //$this->db->join('user_membership', 'user_membership.user_id = users.id');
                $this->db->join('user_membership', 'user_membership.id = users.membership_id', 'left');
                $this->db->join('membership', 'membership.id = user_membership.membership_id', 'left');
                $this->db->join('transaction', 'transaction.payment_id = users.payment_id', 'left');
                $this->db->join('state', 'state.id = users.state', 'left');
                $this->db->join('district', 'district.id = users.district', 'left');
                $this->db->join('state as office_state', 'office_state.id = users.office_state', 'left');
                $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');

                $this->db->from('users');

                $this->db->order_by('users.id',  'DESC'); 
               

                 if(empty($id))
                {
                      //$this->db->limit(100); 
                       $query = $this->db->get();
                        $result =  $query->result_array();
                }else
                {
                     $query = $this->db->get();
                        $result =  $query->row_array();
                }


             
                return $result;

        }


        public function MahasamitiMembers($where=array()) {
                $this->db->select('mahasamiti_members.*');
               $this->db->select('users.first_name , users.last_name , users.middle_name , users.phone , users.post_name');
                     $this->db->select('post_district.name as office_district');
                $this->db->select('service.name as service_category');

               $this->db->join('users', 'users.id = mahasamiti_members.user_id', 'left');
                 $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                if(!empty($where))
                {
                     $this->db->where($where);
                }
               $this->db->from('mahasamiti_members');
               $this->db->order_by('mahasamiti_members.id',  'DESC'); 
               $query = $this->db->get();
               $result =  $query->result_array();
               return $result;

        }


        public function MahasamitiMembersSingle($where=array()) {
                $this->db->select('mahasamiti_members.*');
               $this->db->select('users.first_name , users.last_name , users.middle_name , users.phone , users.post_name');
                     $this->db->select('post_district.name as office_district');
                $this->db->select('service.name as service_category');

               $this->db->join('users', 'users.id = mahasamiti_members.user_id', 'left');
                 $this->db->join('district as post_district', 'post_district.id = users.office_district', 'left');
                $this->db->join('service', 'service.id = users.service_category', 'left');
                if(!empty($where))
                {
                     $this->db->where($where);
                }
               $this->db->from('mahasamiti_members');
               $this->db->order_by('mahasamiti_members.id',  'DESC'); 
               $query = $this->db->get();
               $result =  $query->row_array();
               return $result;

        }

        public function pdf_mahasamiti($id = '')
        {
          
            $row =  $this->common->MahasamitiMembersSingle(['mahasamiti_members.id'=>$id]);
            //echo '<pre>'; print_r($user_data); die;
            if ($row) {
              $array = array(
                'row' => $row,
              );
              $html = $this->load->view('pdf_temp/mahasamitiMembers', $array , true);

              pdf($html , 'D' ,  'membership_join_recept');
            }else
            {
              redirect();
            }
        }


}