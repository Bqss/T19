<div class="modal fade " id="add-product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="">
				<div class="modal-header">
					<h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add New Product</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label mb-2" for="">Product Name</label>
						<input type="text" name="name" placeholder="Product Name" class="form-control">
						<small class="invalid-feedback"></small>
					</div>
					<div class="mb-3">
						<label class="form-label mb-2" for="">Product Category</label>
						<select name="category_id" placeholder="Product Category" class="form-select">
							<option value="">Select Category</option>
							<?php foreach ($categories as $category) : ?>
								<option value="<?= $category->id ?>"><?= $category->name ?></option>
							<?php endforeach; ?>
						</select>
						<small class="invalid-feedback"></small>
					</div>


					<div class="mb-3">
						<label class="form-label mb-2" for="">Product Code</label>
						<input type="text" name="product_code" placeholder="Product Code" class="form-control">
						<small class="invalid-feedback"></small>
					</div>
					<div class="mb-3">
						<label class="form-label mb-2" for="">Price</label>
						<input type="number" name="price" placeholder="Price" class="form-control">
						<small class="invalid-feedback"></small>
					</div>

					<div class="mb-3">
						<label class="form-label mb-2" for="">Quantity</label>
						<input type="number" name="quantity" placeholder="Quantity" class="form-control">
						<small class="invalid-feedback"></small>
					</div>
					<div class="mb-3">
						<label class="form-label mb-2" for="">Description</label>
						<textarea name="description" placeholder="Product Description" class="form-control"></textarea>
						<small class="invalid-feedback"></small>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit">Add Product</button>
				</div>
			</form>
		</div>
	</div>
</div>
