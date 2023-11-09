<div class="modal fade" id="select-product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Select Product</h1>
                <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<div class="d-flex mb-2 justify-content-end">
					<button id="add-product_btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-product_modal">Add Product</button>
				</div>
                <table id="products_table" class="col-12 table table-striped table-borderless w-100">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
