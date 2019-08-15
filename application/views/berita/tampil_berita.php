<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Berita</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

	<div class="container">

		<?php

			$pesan_sukses = $this->session->flashdata('sukses');
			$pesan_gagal = $this->session->flashdata('gagal');
			
			if (!empty($pesan_sukses)) {
				echo "<script>
					swal({
					  title: 'Sukses !',
					  text: '". $pesan_sukses ."',
					  icon: 'success',
					  timer: 3000,
					  button: false
					});
				</script>";
			}

			if (!empty($pesan_gagal)) {
				echo "<script>
					swal({
					  title: 'Gagal !',
					  text: '". $pesan_gagal ."',
					  icon: 'error',
					  timer: 10000,
					  button: false
					});
				</script>";
			}
			
		 ?>

		<h1>News</h1>

		<a class="btn btn-info" href="<?=base_url('berita/tambah_berita')?>">Tambah</a>
		<table class="table table-hover table-striped table-bordered">
			<thead class="bg-dark text-white">
				<tr>
					<td>No</td>
					<td>Waktu</td>
					<td>Gambar</td>
					<td>Judul</td>
					<td>Kategori</td>
					<td>Status</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;

					foreach ($data_berita->result() as $row) : ?>

						<tr>
							<td><?= $no++ ?></td>
							<td><?=$row->datetime?></td>
							<td><img width="50" height="50" src="http://localhost/beritafatih/img/<?=$row->img?>"></td>
							<td><?=$row->title?></td>
							<td><?=$row->category?></td>
							<td><?=$row->status?></td>
							<td>
								<a class="btn btn-warning text-white" href="<?=base_url('Berita/edit_data')?>/<?=$row->id_news?>">Edit</a>
								<a class="btn btn-danger" onclick="konfirmasi('<?=base_url('Berita/hapus_data')?>/<?=$row->id_news?>')" href="#!">Hapus</a>
							</td>
						</tr>
						
				<?php endforeach;?>
			</tbody>
		</table>
	</div>

	<script>
		function konfirmasi(link) {
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			    window.location.href = link;
			  } else {
			    swal({
					  title: 'Batal !',
					  text: 'Data batal dihapus',
					  icon: 'error',
					  timer: 1000,
					  button: false
					});
			  }
			});
		}
	</script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>