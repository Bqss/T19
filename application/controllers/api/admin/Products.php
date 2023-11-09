<?php

class Products extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$products = $this->ProductModel->getAll();

		exit(json_encode([
			'status' => 'success',
			'data' => $products
		]));
	}

	public function create()
	{
		$this->form_validation->set_rules($this->ProductModel->rules());
		if ($this->form_validation->run() == FALSE) {
			http_response_code(422);
			exit(json_encode([
				'status' => 'error',
				'errors' => $this->form_validation->error_array()
			]));
		}
		$data = $this->input->post(['name', 'category_id', 'product_code', 'price', 'quantity']);
		if($this->ProductModel->create($data)){
			http_response_code(201);
			exit(json_encode([
				'status' => 'success',
				'message' => 'Product created successfully'
			]));
		}else{
			http_response_code(500);
			exit(json_encode([
				'status' => 'error',
				'message' => 'Failed to create product, something wrong'
			]));
		};
	}



	public function destroy($id)
	{
		if(!$id) {
			http_response_code(400);
			exit(json_encode([
				'status' => 'error',
				'message' => 'Product id is required'
			]));
		}
		if($this->ProductModel->delete($id)){
			http_response_code(200);
			exit(json_encode([
				'status' => 'success',
				'message' => 'Product deleted successfully'
			]));
		}else{
			http_response_code(500);
			exit(json_encode([
				'status' => 'error',
				'message' => 'Failed to delete product, something wrong'
			]));
		}
	}

}
