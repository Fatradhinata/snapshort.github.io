<?php 

class User_models extends CI_Model {
    public function getAllUsers() {
        return $this->db->get('user')->result_array();
    }

    public function getUsers($limit, $start) 
    {
        $query = $this->db->get('user', $limit, $start)->result_array();

        foreach ($query as $key => $user) {            
            $query[$key]['total_report'] = $this->getTotalReport($user['user_id']);
            $query[$key]['total_content'] = $this->getTotalContent($user['user_id']);
            $query[$key]['total_likes'] = $this->getTotalContent($user['user_id']);
        }
        return $query;
    }

    public function count_all_users() 
    {
        return $this->db->get('user')->num_rows();
    }

    public function getTotalReport($user) {
        $this->db->where('reported_id', $user);
        return $this->db->get('report')->num_rows();        
    }
    public function getTotalContent($user) {
        $this->db->where('user_id', $user);
        return $this->db->get('content')->num_rows();        
    }
    public function getTotalLikes($user) {
        $this->db->where('user_id', $user);
        return $this->db->get('likes')->num_rows();        
    }
}