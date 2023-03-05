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
	<form action="/admin/update_fasilitas" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id_type }}"> <br/>
		Nama <input type="text" required="required" name="type_label" value="{{ $p->type_label }}"> <br/>
		Fasilitas <input type="text" required="required" name="fasilitas" value="{{ $p->fasilitas }}"> <br/>

		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>