<?php

class Social_metrics extends CI_Model
{
    public function createComment($user_id, $content_id, $comment, $voice, $reply_id)
    {
        if ($comment == '') {
            $comment = null;
        }
        date_default_timezone_set('Asia/Jakarta');
        $comment_data = [
            'user_id' => $user_id,
            'content_id' => $content_id,
            'comment' => $comment,
            'voice_note' => $voice,
            'reply' => $reply_id,
            'created_date' => date('Y-m-d\TH:i:s', strtotime('now'))
        ];

        return $this->db->insert("comment", $comment_data);
    }

    public function getComments($content_id)
    {
        $this->db->where('content_id', $content_id);
        $this->db->from('comment');
        $this->db->order_by('created_date', 'desc');
        $comments = $this->db->get()->result_array();
    
        foreach ($comments as $ind => $comment) {
            if ($comment['voice_note'] != null) {
            $comments[$ind]['voice_note'] = $this->encodeVoiceNote($comment['voice_note']);
            }
        }
        
        return $this->getReplyComment($comments);
    }
    
    private function encodeVoiceNote($blobData)
    {
        return base64_encode($blobData);
    }

    public function getThisComments($limit, $start, $content_id)
    {
        $this->db->where('content_id', $content_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get('comment')->result_array();   

        foreach ($query as $key => $comment) {
            $query[$key]['voice_note'] = base64_encode($comment['voice_note']);
            $query[$key]['total_reply'] = $this->getTotalReply($comment['id']);
            $query[$key]['total_report'] = $this->getTotalReport($comment['id']);
        }
        return $query;
    }
    

    public function getNewComment($content_id)
    {
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('content_id', $content_id);
        $this->db->order_by('created_date', 'desc');
        $this->db->limit(1);
    
        $query = $this->db->get()->row_array();

        $data = $query;
    
        return $data;
    }
    

    public function getUserComment($user_id)
    {
        $this->db->where_in('user_id', $user_id);
        return $this->db->get('user')->result_array();
    }

    public function getUserReplyComment($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user')->row_array();
        $query['profile_picture'] = base64_encode($query['profile_picture']) ;
        return $query;
    }


    public function getTotalComment($content_id)
    {
        $this->db->from('comment');
        $this->db->where('content_id', $content_id);
        return $this->db->count_all_results();
    }
    public function getReplyComment($comments)
    {
        // Fungsi untuk membandingkan tanggal
        function sortByDate($a, $b) {
            $dateA = strtotime($a['created_date']);
            $dateB = strtotime($b['created_date']);
            return $dateA - $dateB;
        }
    
        // Fungsi untuk mengurutkan replies di setiap komentar
        function sortRepliesByDate($comment) {
            usort($comment['replies'], 'sortByDate');
            return $comment;
        }
    
        foreach ($comments as $key => $comment) {
            $comments[$key]['replies'] = array();
            
            foreach ($comments as $ind => $comment2) {
                if ($key !== $ind && isset($comments[$key])) { 
                    if ($comment['id'] == $comment2['reply']) {
                        $comments[$key]['replies'][] = $comments[$ind];
                        
                        unset($comments[$ind]);
                    }
                }
            }
    
            // Mengurutkan replies di setiap komentar
            $comments[$key] = sortRepliesByDate($comments[$key]);
        }
    
        $comments = array_values($comments);
    
        return $comments;
    }
    
    public function count_all_comments($content_id) {
        $this->db->where('content_id', $content_id);
        return $this->db->get('comment')->num_rows();
    }
    
    public function getTotalReply($comment_id) {
        $this->db->where('reply', $comment_id);
        return $this->db->get('comment')->num_rows();
    }
    
    public function getTotalReport($comment_id) {
        $this->db->where('reported_id', $comment_id);
        return $this->db->get('report')->num_rows();
    }
    
}