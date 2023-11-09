<?php
require_once APPPATH . 'views/pages/admin/product/partials/add-product-modal.php';
require_once APPPATH . 'views/pages/admin/product/partials/product-print-modal.php';
require_once APPPATH . 'views/pages/admin/product/partials/select-ingredient-modal.php';
require_once APPPATH . 'views/pages/admin/product/partials/select-product-modal.php'
?>

<div class="p-2">
	<div class="row mb-3 align-items-end">
		<div class="col-sm-2">
			<button class="btn btn-primary" data-bs-toggle="modal" id="select-product_btn">Select Product</button>
		</div>
		<div class="row col-sm-8 ms-2 gx-5">
			<input type="hidden" name="product_id" id="product_id">
			<div class="col">
				<input type="text" class="form-control" id="product_code" class="ms-2" readonly>
			</div>
			<div class="col">
				<input type="text" class="form-control" id="product_name" class="ms-2" readonly>
			</div>
			<div class="col">
				<div class="input-group">
					<span class="input-group-text">
						QTY
					</span>
					<input type="text" class="form-control" id="product_qty" class="ms-2">
				</div>
			</div>
		</div>
	</div>
	<div class="row mb-3 align-items-end">
		<div class="col-sm-2">
			<button class="btn btn-primary" id="add-ingredient_button">Select Ingredient</button>
		</div>
		<div class="row col-sm-8 ms-2 gx-5 align-items-end">
			<div class="col-sm-4">
				<input type="text" class="form-control" id="ingredient_code" class="ms-2" readonly>
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="ingredient_name" class="ms-2" readonly>
			</div>
		</div>
		<button class="btn btn-primary col-sm-1" id="add-ingredient">Add</button>
	</div>
	<table id="selected-ingredients_table" class="col-12 table table-striped table-borderless w-100">
		<thead class="bg-secondary">
			<tr>
				<th>No</th>
				<th>Kode Bahan</th>
				<th>Nama Bahan</th>
				<th>QTY</th>
				<th>Action</th>
			</tr>
		</thead>
	</table>
	<button class="btn btn-primary" id="print-product_btn">Print Product</button>
</div>
<?=
$this->my_loader->push('scripts', '
		<script>
			let ingredientTable, productTable, addedIngredientTable;

			let ingredients = [
				{
					no : 1,
					code : "IG-01",
					name : "Sawi"
				},
				{
					no : 2,
					code : "IG-02",
					name : "Daging biawak"
				},
				{
					no : 3,
					code : "IG-03",
					name : "MSG Fuiyooh"
				},
				{
					no : 4,
					code : "IG-04",
					name : "Kutil Badak"
				},
			];

			function selectProduct(ev){
				ev.preventDefault();
				const selected = productTable.row($(this).closest("tr")).data();
				$("#product_code").val(selected.product_code);
				$("#product_id").val(selected.id);
				$("#product_name").val(selected.name);
				$("#product_qty").val(1);
				$("#select-product_modal").modal("hide");
				initProductIngredientTable();
			}

            function initProductIngredientTable(){
                addedIngredientTable && addedIngredientTable.destroy();
				$.ajax({
					type: "GET",
					url: `/api/admin/products/${$("#product_id").val()}/ingredients`,
					dataType: "json",
					success: function (response) {
						addedIngredients = response.data.map((val, index) => {
							return {
								no : index + 1,
								...val,
							}
						});
						addedIngredientTable  = $("#selected-ingredients_table").DataTable({
							"order" : [],
							dom: "tip",
							data: addedIngredients,
							"columns": [
								{ "data": "no" },
								{ "data": "ingredient_code" },
								{ "data": "ingredient_name" },
								{ 
									"data" : "amount",
									"render" : (data, index, row) => `<input type="number" id="qty_in" class="form-control" value="${data}" data-id="${row.id}">`,
								},
								{
									"data" : "id",
									"render" : data => `<button class="btn btn-danger" id="remove-ingredient_btn" data-id="${data}"><i class="fas fa-trash "></i></button>`
								}
							]
						})
					},
					error : function(xhr){
						alert(xhr.responseJSON.message);
					},
				});
                
            }

			function addIngredient(ev){
				ev.preventDefault();
                if($("#ingredient_name").val() == "" || $("#ingredient_code").val() == ""){
                    alert("Please select ingredient first");
                    return;
                }
                if(addedIngredientTable.data().toArray().find(val => val.ingredient_code == $("#ingredient_code").val())){
                    alert("Ingredient already added");
                    $("#ingredient_name").val("");
                    $("#ingredient_code").val("");
                    return;
                }
				const res = {
					ingredient_name : $("#ingredient_name").val(),
					ingredient_code : $("#ingredient_code").val(),
					product_id : $("#product_id").val(),
					amount : 1,
				};
				const hideLoader = showButtonLoader($(this));
				$.ajax({
					type: "POST",
					url: `/api/admin/products/${res.product_id}/ingredients`,
					data: res,
					dataType: "json",
					success: function (response) {
						initProductIngredientTable();
						$("#ingredient_name").val("");
						$("#ingredient_code").val("");
					},
					error : function(xhr){
						alert(xhr.responseJSON.message);
					},
					complete : hideLoader
				});
				refreshIngredientTable();
                $("#ingredient_name").val("");
                $("#ingredient_code").val("");
			}

            function printProduct(){
                if(!$("#product_name").val() || !$("#product_code").val() || ! $("#product_name").val() || !$("#product_qty").val() || addedIngredients.length == 0){
                    alert("Please fill all product data");
                    return;
                }
                const data = {
                    product : {
                        name : $("#product_name").val(),
                        code : $("#product_code").val(),
                        qty : $("#product_qty").val(),
                    },
                    ingredients : addedIngredients,
                };
                $("[res-p-name]").text(data.product.name);  
                $("[res-p-code]").text(data.product.code);  
                $("[res-p-qty]").text(data.product.qty);
				showLoader();
				$.ajax({
					type: "GET",
					url: `/api/admin/products/${$("#product_id").val()}/ingredients`,
					dataType: "json",
					success: function (response) {
						const ingredients =  response.data.map((e,i) => {
							return `<tr>
								<td>${i+1}.</td>
								<td>${e.ingredient_code}</td>
								<td>${e.ingredient_name}</td>
								<td>${e.amount}</td>
							</tr>`;
						}).join("");
						$("[res-p-ingredients]").html(ingredients);
						$("#product-preview_modal").modal("show");
					},
					error : function(xhr){
						alert(xhr.responseJSON.message);
					},
					complete : hideLoader
				});

                
            }
  
			function selectIngredient(ev){
				ev.preventDefault();
				const selected = ingredients.find(val => val.code == $(this).data("id"));
				$("#ingredient_code").val(selected.code);
				$("#ingredient_name").val(selected.name);
				$("#select-ingredient_modal").modal("hide");
			}

			function initProductTable(){
				productTable && productTable.destroy();
				showLoader();
				$.ajax({
					type: "GET",
					url: "/api/admin/products",
					dataType : "json",
					success: function (data) {
						productTable = $("#products_table").DataTable({
							"order" : [],
							dom: "tip",
							data: data.data.map((val, index) => {
								return {
									no : index + 1,
									...val,
								}
							}),
							"columns": [
								{ "data": "no" },
								{ "data": "product_code" },
								{ "data": "name" },
								{ 
									"data": "no",
									"render" : (data,index,row) => 
									`<div class="d-flex gap-1 justify-content-center">
										<button class="btn btn-success" title="Select" id="select-product_btn" ><i class="fas fa-check fa-2xs" ></i></button>
										<button class="btn btn-danger" title="Delete" id="delete-product_btn" data-id="${row.id}"><i class="fas fa-trash fa-2xs" ></i></button>
									</div>
									`,
								},
							]
						});
						$("#select-product_modal").modal("show");
					},
					error : function(xhr){
						alert(xhr.responseJSON.message);
					},
					complete : hideLoader
				})
				
			}

			$(document).ready(function(){

				// table initialization
				ingredientTable = $("#ingredients_table").DataTable({
					"order" : [],
					dom: "tip",
					data: ingredients,
					"columns": [
						{ "data": "no" },
						{ "data": "code" },
						{ "data": "name" },
						{ 
							"data": "code",
							"render" : (data) => `<button class="btn btn-primary" id="select-ingredient_btn" data-id="${data}"><i class="fas fa-check fa-2xs" ></i></button>`,
						},

					]
				});
				// all about product
				$("#products_table").on("click","#select-product_btn",selectProduct);
				$("#add-product_modal form").submit(function(ev){
					ev.preventDefault();
					const data = $(this).serialize();
					const hideLoader = showButtonLoader($(this).find("button[type=submit]"));
					$.ajax({
						type: "POST",
						url: "/api/admin/products",
						data: data,
						dataType: "json",
						success: function (response) {
							
							alert(response.message);
							$("#add-product_modal").modal("hide");
							initProductTable();
							
						},
						error : function(xhr){
							if(xhr.status == 422){
								showValidationErrors(xhr.responseJSON.errors,"#add-product_modal form")
							}else{
								alert(xhr.responseJSON.message);
							}
						},
						complete  : hideLoader
					});
				});
				$("#select-product_btn").click(initProductTable);
				$("#products_table").on("click", "#delete-product_btn", function(){
					const id = $(this).data("id");
					const confirm = window.confirm("Are you sure want to delete this product?");
					if(!confirm) return;
					const hideLoader = showButtonLoader($(this));
					$.ajax({
						type: "DELETE",
						url: "/api/admin/products/" + id,
						dataType: "json",
						success: function (response) {
							alert(response.message);
							initProductTable();
						},
						error : function(xhr){
							alert(xhr.responseJSON.message);
						},
						complete : hideLoader
					});
				});

				// all about ingredient
		
				$("#ingredients_table").on("click","#select-ingredient_btn",selectIngredient);
				$("#add-ingredient").on("click",addIngredient);
                $("#add-ingredient_button").click(function(){
                    if($("#product_code").val() == "" || $("#product_name").val() == "" || $("#product_qty").val() == "" || $("#product_qty").val() == 0){
                        alert("Please select product first");
                        return;
                    }
                    $("#select-ingredient_modal").modal("show");
                })
                $("#selected-ingredients_table").on("click", "#remove-ingredient_btn", function(){
					const confirm = window.confirm("Are you sure want to delete this ingredient?");
					if(!confirm) return;
					const hideLoader = showButtonLoader($(this));
					$.ajax({
						type: "DELETE",
						url: `/api/admin/products/ingredients/${$(this).data("id")}`,
						dataType: "json",
						success: function (response) {
							alert(response.message);
							initProductIngredientTable();
						},
						error : function(xhr){
							alert(xhr.responseJSON.message);
						},
						complete : hideLoader
					});
                });

                $("#print-product_btn").click(printProduct);
			
				$("#selected-ingredients_table").on("change", "#qty_in", function(){
					const hideLoader = showButtonLoader($(this));
					$.ajax({
						type: "PUT",
						url: `/api/admin/products/ingredients/${$(this).data("id")}`,
						data: {
							...addedIngredientTable.row($(this).closest("tr")).data(),
							amount : $(this).val(),
						},
						dataType: "json",
						success: function (response) {
							alert(response.message);
							initProductIngredientTable();
						},
						error : function(xhr){
							alert(xhr.responseJSON.message);
						},
						complete : hideLoader
					});
				});
			});
		</script>
	');
?>
