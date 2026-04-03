<?php

class Follows extends CI_Model
{
    public function getUserById($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function follow($followed_id, $follower_id)
    {
        $data = array(
            'follower_id' => $follower_id,
            'followed_id' => $followed_id
        );
        $this->db->insert('follows', $data);
        return $this->db->affected_rows();
    }

    public function unfollow($followed_id, $follower_id)
    {
        $this->db->where('follower_id', $follower_id);
        $this->db->where('followed_id', $followed_id);
        $this->db->delete('follows');
        return $this->db->affected_rows();
    }

    public function is_following($followed_id, $follower_id)
    {
        $this->db->where('follower_id', $follower_id);
        $this->db->where('followed_id', $followed_id);
        $query = $this->db->get('follows');
        return $query->num_rows() > 0;
    }

    public function getTotalFollowers($user_id) {
        $this->db->where('follower_id', $user_id);
        return $this->db->get('follows')->num_rows();        
        
    }
    
    public function getTotalFollowed($user_id) {    
        $this->db->where('followed_id', $user_id);
        return $this->db->get('follows')->num_rows();
    }
}