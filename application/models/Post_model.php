<?php
class Post_model extends CI_Model {

    

     


        public function getAllPost($fieldname = ''  , $order_by = '' , $limit = '' , $offset='')
        {
                $this->db->select('post.*');
                $this->db->select('category.cat_name , category.id as cat_id');

                if(is_array($fieldname))
                {
                        $this->db->where($fieldname);   
                }

                

                $this->db->from('post');

                $this->db->join('category', 'category.id = post.cat_id', 'left');

                if (!empty($order_by) && is_array($order_by)) {

                      $this->db->order_by($order_by);

                }elseif(!empty($order_by))
                {
                    $this->db->order_by('post.id',$order_by);  
                    
                }else
                {
                    $this->db->order_by('post.id','DESC');  
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


}