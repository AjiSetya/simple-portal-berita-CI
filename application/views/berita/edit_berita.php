<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Berita</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h1>Edit Data</h1>
		
		<?php foreach ($data_update->result() as $key) : ?>
				
		

		<form method="post" action="<?=base_url('berita/update')?>/<?=$key->id_news?>" enctype="multipart/form-data">

			<div class="form-group">
				<label>Judul</label>
				<input class="form-control" type="text" name="judul" value="<?=$key->title?>" placeholder="Judul berita">
			</div>
			<div class="form-group">
				<label>Berita</label>
				<textarea class="ckeditor form-control" name="berita" id="berita" cols="30" rows="6"><?=$key->news?></textarea>
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<input class="form-control" type="text" value="<?=$key->category?>" name="kategori" placeholder="Kategori berita">
			</div>
			<div class="form-group">
				<label>Gambar</label>
				<!-- <input type="file" name="img_news"> -->
				<input class="form-control" type="file" value="<?=$key->img?>" name="img_news" placeholder="">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value="post" <?=$key->status === 'post' ? "selected = 'selected'" : "" ?>>POST</option>
					<option value="draft" <?=$key->status === 'draft' ? "selected = 'selected'" : "" ?>>DRAFT</option>
				</select>
			</div>
			<input type="submit" class="btn btn-primary" value="Perbarui">
		</form>
	</div>

	<?php endforeach; ?>
	<!-- ckeditor -->
	<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>