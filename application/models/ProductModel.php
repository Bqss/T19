<?php


class ProductModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll()
	{
		return $this->db->get('products')->result();
	}

	public function create($data)
	{
		return $this->db->insert('products', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('products', ['id' => $id]);
	}
	public function rules()
	{
		return [
			[
				"field" => "name",
				"label" => "Product Name",
				"rules" => "required"
			],
			[
				"field" => "category_id",
				"label" => "Product Category",
				"rules" => "required|integer"
			],
			[
				"field" => "product_code",
				"label" => "Product Code",
				"rules" => "required"
			],
			[
				"field" => "price",
				"label" => "Product Price",
				"rules" => "required|numeric|less_than_equal_to[99999999.99]"
			],
			[
				"field" => "quantity",
				"label" => "Product Quantity",
				"rules" => "integer"
			],
		];
	}
}
