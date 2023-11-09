<?php

class ProductItems extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductItemModel');
		$this->load->library('form_validation');
	}

	public function index(string $productId)
	{
		if (!$productId) {
			exit(json_encode([
				'status' => 'error',
				'message' => 'Product ID is required'
			]));
		}
		$items = $this->ProductItemModel->getByProductID($productId);
		exit(json_encode([
			'status' => 'success',
			'data' => $items
		]));
	}
	public function store(string $productId)
	{
		$this->form_validation->set_rules($this->ProductItemModel->rules());
		if ($this->form_validation->run() == FALSE) {
			http_response_code(422);
			exit(json_encode([
				'status' => 'error',
				'errors' => $this->form_validation->error_array()
			]));
		}
		$data = $this->input->post(['product_id', 'ingredient_code', 'ingredient_name', 'amount']);
		if ($this->ProductItemModel->create($data)) {
			http_response_code(201);
			exit(json_encode([
				'status' => 'success',
				'message' => 'Product item created successfully'
			]));
		} else {
			http_response_code(500);
			exit(json_encode([
				'status' => 'error',
				'message' => 'Failed to create product item, something wrong'
			]));
		};
	}

	public function update(string $id)
	{
		$inputData = $this->input->input_stream();
		$formData = array_intersect_key($inputData,[
			'product_id'=>'',
			'ingredient_code' => '',
			'ingredient_name' => '',
			'amount' => ''
		]);
		$this->form_validation->set_data($formData);
		$this->form_validation->set_rules($this->ProductItemModel->rules());
		if ($this->form_validation->run() == FALSE) {
			http_response_code(422);
			exit(json_encode([
				'status' => 'error',
				'message ' => 'Failed to update product item, something wrong',
				'errors' => $this->form_validation->error_array()
			]));
		}else{
			if ($this->ProductItemModel->update($id, $formData)) {
				http_response_code(200);
				exit(json_encode([
					'status' => 'success',
					'message' => 'Product item updated successfully'
				]));
			} else {
				http_response_code(500);
				exit(json_encode([
					'status' => 'error',
					'message' => 'Failed to update product item, something wrong'
				]));
			};
		}
	}

	public function destroy(string $id)
	{
		if ($this->ProductItemModel->delete($id)) {
			http_response_code(200);
			exit(json_encode([
				'status' => 'success',
				'message' => 'Product item deleted successfully'
			]));
		} else {
			http_response_code(500);
			exit(json_encode([
				'status' => 'error',
				'message' => 'Failed to delete product item, something wrong'
			]));
		};
	}
}
