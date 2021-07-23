<?php 

class Adminmodel extends CI_Model
{



	public function all_posts()
	{
		$q = $this->db->from('posts')
						// ->limit( $limit, $offset )
						->get();
		return $q->result();
	}
	
	public function postslist($limit, $offset)
	{	
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select(['id','title'])
							->from('posts')
							->where('user_id', $user_id)
							->limit( $limit, $offset )
							->get();
		return $q->result();
	}

	public function num_rows()
	{	
		$user_id = $this->session->userdata('user_id');
		$q = $this->db->select(['id','title'])
							->from('posts')
							->where('user_id', $user_id)
							->get();
		return $q->num_rows();
	}

	public function store_post($array)
	{
		return $this->db->insert('posts', $array);	
	}

	public function find_post($post_id)
	{
		$q = $this->db->select(['id','title', 'description', 'user_id'])
					->where('id', $post_id)
					->get('posts');
		return $q->row();	
	}

	public function update_post($post_id, array $post)
	{
		return $this->db->where('id', $post_id)
						->update('posts', $post);
	}

	public function delete_post($post_id, $current_user)
	{
		$q = $this->db->select('user_id')
					->where('id', $post_id)
					->get('posts');

		// echo "<pre>";
		// var_dump($q->row());
		if(!empty($q->row())){
			if ($q->row()->user_id ==  $current_user) {
				return $this->db->delete('posts', ['id'=>$post_id]);
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
		
	}

	public function search($query)
	{
		$q = $this->db->select(['id','title', 'description', 'user_id'])
					->from('posts')
					->like('title', $query)
					->get();
		return $q->result();
	}

	public function single_post( $id )
	{
		$q = $this->db->from('posts')
					->where(['id' => $id])
					->get();

		if ($q->num_rows()) {
			return $q->row();
		}else{
			return false;
		}
	}
}
?>