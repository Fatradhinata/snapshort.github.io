<?php

class Likes extends CI_Model
{
    public function getContentById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('content');
        return $query->row();
    }
    public function like($user_id, $content_id)
    {
        $data = array(
            'user_id' => $user_id,
            'content_id' => $content_id
        );
        $this->db->insert('likes', $data);
        return $this->db->affected_rows();
    }

    public function unlike($user_id, $content_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('likes');
        return $this->db->affected_rows();
    }

    public function is_liked($user_id, $content_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('content_id', $content_id);
        $query = $this->db->get('likes');
        return $query->num_rows() > 0;
    }

    public function getTotalLike($content_id)
    {
        $this->db->where('content_id', $content_id);
        $query = $this->db->get('likes');
        return $query->num_rows();
    }

    public function getUserTotalLikes($content_array) {
        $this->db->where_in('content_id', $content_array);
        $query = $this->db->get('likes')->num_rows();

        if ($query < 1) {
            $query = 0;
        }

        return $query;
    }   
}