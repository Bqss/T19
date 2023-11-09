<?php 

	class ProductItemModel extends CI_Model{
		public function __construct()
		{	
			parent::__construct();
			$this->load->database();
		}

		public function getAll()
		{
			return $this->db->get('product_ingredients')->result();
		}

		public function getByProductID(string $productId){
			return $this->db->get_where('product_ingredients', ['product_id' => $productId])->result();
		}

		public function create($data)
		{
			return $this->db->insert('product_ingredients', $data);
		}

		public function delete($id)
		{
			return $this->db->delete('product_ingredients', ['id' => $id]);
		}

		public function update($id, $data)
		{
			return $this->db->update('product_ingredients', $data, ['id' => $id]);
		}

		public function rules(){
			return [
				[
					"field" => "product_id",
					"label" => "Product ID",
					"rules" => "required|integer"
				],
				[
					"field" => "ingredient_code",
					"label" => "Ingredient Code",
					"rules" => "required"
				],
				[
					"field" => "ingredient_name",
					"label" => "Ingredient Name",
					"rules" => "required"
				],	
				[
					"field" => "amount",
					"label" => "Amount",
					"rules" => "required|integer"
				],
			];	
		}
	}
?>
