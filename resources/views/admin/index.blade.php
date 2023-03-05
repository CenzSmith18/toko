  <!-- Navbar -->
  @includeIf('layouts.navbar')
  <!-- /.navbar -->


<br><br>

<div class="container">
<a href="/admin/tambah_type"> + Tambah Tipe</a>
<table class="table caption-top">
  <caption>List Tipe</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipe Kamar</th>
      <th scope="col">Jumlah Kamar</th>
     
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $angka = 0; ?>
  @foreach($kamar as $p)
    <?php $angka++; ?>
    <tr>
    <td>{{ $angka}}</td>
      <td>{{ $p->type_label}}</td>
     
			<td>{{ $p->jumlah_kamar }}</td>
      <td>
				<a href="/admin/edit_type/{{ $p->id_type }}">Edit</a>
				|
				<a href="/admin/hapus_type/{{ $p->id_type }}">Hapus</a>
			</td>
    </tr>
    @endforeach
  </tbody>
</table>

