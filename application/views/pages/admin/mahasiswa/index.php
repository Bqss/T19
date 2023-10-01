<div class="p-2">
	<div class="d-flex mb-3 justify-content-end">
		<a href="<?= base_url('index.php/admin/mahasiswa/create') ?>" class="btn btn-primary">Tambahkan mahasiswa</a>
	</div>
	<table class="col-12 table table-striped table-borderless">
		<thead class="bg-secondary">
			<tr>
				<th>No</th>
				<th>Action</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
			</tr>
		</thead>
	</table>
</div>


<?= 
	$this->my_loader->push('scripts', '
		<script>
			$(document).ready(function(){
				$("table").DataTable({
					"processing": true,
					"serverSide": true,
					"ajax": {
						"url": "' . base_url('index.php/admin/mahasiswa/data') . '",
						"type": "POST"
					},
					"order" : [],
					"columns": [
						
						{ "data": "no" },
						{ "data": "aksi" },
						{ "data": "nim" },
						{ "data": "nama" },
						{ "data": "jenis_kelamin" },
						{ "data": "alamat" }
						
					]
				});
			});
		</script>
	');
?>
