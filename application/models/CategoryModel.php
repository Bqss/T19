<?php


class CategoryModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll()
	{
		return $this->db->get('categories')->result();
	}
}
