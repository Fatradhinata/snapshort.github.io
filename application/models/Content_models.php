<?php

class Content_models extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Likes');
        $this->load->model('Follows');
    }
    public function getAllContent()
    {
        return $this->db->get('content')->result_array();
    }

    public function getContents($limit, $start)
    {
        return $this->db->get('content', $limit, $start)->result_array();
    }

    public function count_all_contents()
    {
        return $this->db->get('content')->num_rows();
    }

    public function get_followed_content($user_id)
    {
        $followed_ids = $this->user_followed($user_id);
        if (empty($followed_ids)) {
            return null;
        }

        $this->db->where_in('user_id', $followed_ids);
        $this->db->order_by('date', 'DESC');
        $content = $this->db->get('content')->result_array();

        return $content;
    }

    public function user_followed($user_id)
    {
        $this->db->select('followed_id');
        $this->db->where('follower_id', $user_id);
        $query = $this->db->get('follows');

        $result = $query->result_array();

        $followed_ids = array();
        foreach ($result as $row) {
            $followed_ids[] = $row['followed_id'];
        }

        return $followed_ids;
    }

    public function getUserContent($contents, $session_user_id)
    {
        $own_user_id = $session_user_id;

        $user_id = [];
        foreach ($contents as $key => $ctn) {
            $user_id[] = $ctn['user_id'];
        }
        ;

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_in('user_id', $user_id);
        $this->db->order_by("FIELD(user_id, " . implode(', ', array_map(function ($val) {
            return "'" . $val . "'";
        }, $user_id)) . ")");

        $users_content = $this->db->get()->result_array();

        foreach ($users_content as $key => $value) {
            $users_content[$key]['profile_picture'] = base64_encode($users_content[$key]['profile_picture']);
            $users_content[$key]['is_following'] = $this->Follows->is_following($own_user_id, $users_content[$key]['user_id']);
            $users_content[$key]['total_like'] = $this->Likes->getTotalLike($contents[$key]['id']);
            $users_content[$key]['is_liked'] = $this->Likes->is_liked($own_user_id, $contents[$key]['id']);
        }

        $sortedArray = [];

        foreach ($contents as $item1) {
            $user_id1 = $item1['user_id'];

            foreach ($users_content as $item2) {
                $user_id2 = $item2['user_id'];

                if ($user_id1 === $user_id2) {
                    $sortedArray[] = $item2;
                    break;
                }
            }
        }

        $users_content = $sortedArray;

        return $users_content;
    }

    public function getUserContentWithout($contents)
    {

        $user_id = [];
        foreach ($contents as $key => $ctn) {
            $user_id[] = $ctn['user_id'];
        }
        ;

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_in('user_id', $user_id);
        $this->db->order_by("FIELD(user_id, " . implode(', ', array_map(function ($val) {
            return "'" . $val . "'";
        }, $user_id)) . ")");

        $users_content = $this->db->get()->result_array();

        foreach ($users_content as $key => $value) {
            $users_content[$key]['profile_picture'] = base64_encode($users_content[$key]['profile_picture']);
            $users_content[$key]['total_like'] = $this->Likes->getTotalLike($contents[$key]['id']);
        }

        $sortedArray = [];

        foreach ($contents as $item1) {
            $user_id1 = $item1['user_id'];

            foreach ($users_content as $item2) {
                $user_id2 = $item2['user_id'];

                if ($user_id1 === $user_id2) {
                    $sortedArray[] = $item2;
                    break;
                }
            }
        }

        $users_content = $sortedArray;

        return $users_content;
    }

    public function getContentLikes($content_id)
    {
        $this->db->where_in('content_id', $content_id);
        $this->db->from('likes');
        return $this->db->get()->num_rows();
    }

    public function update_view($id)
    {
        $this->db->set('view', 'view+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update('content');
    }

    public function get_content_from_cat($catArray, $user_id)
    {
        $cat_string = implode(",", $catArray);
    
        $this->db->select('*');
        $this->db->from('content');
        $this->db->like("categories", $cat_string); 
        $result = $this->db->get()->result_array();
        
        $data['contents'] = $result;
    
        if ($this->db->affected_rows() > 0) {
            foreach ($data['contents'] as $key => $ctn) {
                $data['contents'][$key]['likes'] = $this->getContentLikes($ctn['id']);
            }
    
            $data['user_content'] = $this->getUserContent($data['contents'], $user_id);
        } else {
            $data['contents'] = null;
            $data['user_content'] = null;
        }
    
        return $data;
    }
    public function get_content_from_cat_without($catArray)
    {
        $cat_string = implode(",", $catArray);
    
        $this->db->select('*');
        $this->db->from('content');
        $this->db->like("categories", $cat_string); 
        $result = $this->db->get()->result_array();
        
        $data['contents'] = $result;
    
        if ($this->db->affected_rows() > 0) {
            foreach ($data['contents'] as $key => $ctn) {
                $data['contents'][$key]['likes'] = $this->getContentLikes($ctn['id']);
            }
    
            $data['user_content'] = $this->getUserContentWithout($data['contents']);
        } else {
            $data['contents'] = null;
            $data['user_content'] = null;
        }
    
        return $data;
    }
    

}