<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Edit Pegawai</h3>
 
	<a href="/fasilitas_hotel"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($fasilitas_hotel as $p)
	<form action="/admin/update_fasilitas_hotel" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id_fasilitas_hotel }}"> <br/>
		Nama <input type="text" required="required" name="nama_fasilitas_hotel" value="{{ $p->nama_fasilitas_hotel }}"> <br/>
		Keterangan <input type="text" required="required" name="keterangan" value="{{ $p->keterangan }}"> <br/>

		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>