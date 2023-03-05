  <!-- Navbar -->
  @includeIf('layouts.navbar')
  <!-- /.navbar -->


<br><br>

<div class="container">
<a href="/admin/tambah_fasilitas_hotel"> + Tambah Fasilitas Hotel</a>
<table class="table caption-top">
  <caption>Fasilitas Hotel</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">Nama Fasilitas</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Image</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $angka = 0; ?>
  @foreach($fasilitas_hotel as $p)
    <?php $angka++; ?>
    <tr>
    <td>{{ $angka}}</td>
      
      <td>{{ $p->nama_fasilitas_hotel}}</td>
			<td>{{ $p->keterangan }}</td>
            <td>{{ $p->image }}</td>
      <td>
				<a href="/admin/edit_fasilitas_hotel/{{ $p->id_fasilitas_hotel }}">Edit</a>
				|
				<a href="/admin/show_fasilitas_hotel/{{ $p->id_fasilitas_hotel }}">Lihat</a>
			</td>
    </tr>
    @endforeach
  </tbody>
</table>

