<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Edit Pegawai</h3>
 
	<a href="/pegawai"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($type as $p)
	<form action="/admin/update_type" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id_type }}"> <br/>
		Nama <input type="text" required="required" name="type_label" value="{{ $p->type_label }}"> <br/>
		Jumlah Kamar <input type="text" required="required" name="jumlah_kamar" value="{{ $p->jumlah_kamar }}"> <br/>

		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>