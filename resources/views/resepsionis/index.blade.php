  <!-- Navbar -->
  @includeIf('layouts.navbar')
  <!-- /.navbar -->


<br><br>

<div class="container">
<div class="container">
    <div class="row">
        <div class="col">
            <form action="/resepsionis/cari2" method="GET">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="date">
                    <button class="btn btn-primary" type="submit">GET</button>
                </div>
            </form>
        </div>
        <div class="col">

        </div>
        
        <div class="col">

            <form action="/resepsionis/cari" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="cari" class="form-control" placeholder="Cari Nama Tamu .."
                        value="{{ old('cari') }}">

                    <button class="btn btn-primary" type="submit">CARI</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{$users}}
<table class="table caption-top">
  <caption>List Booking</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Tamu</th>
      <th scope="col">Tanggal Check-In</th>
      <th scope="col">Tanggal Check-Out</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
 
    <?php $angka = 0; ?>
  @foreach($users as $p)
  <?php
  if($p -> tanggal_checkin == date("Y-m-d"))

  ?>
    <?php $angka++; ?>
    <tr>
    <td>{{$angka}}</td>
    <td>{{$p -> name}}</td>
    <td>{{$p -> tanggal_checkin}}</td>
    <td>{{$p -> tanggal_checkout}}</td>
    <?php
    if ($p -> status == 0) { 
     echo "<td>Check In</td>";
    } else {
     echo "<td>Check Out</td>";
    }
 
    ?>
    <tr>
     
    @endforeach
  </tbody>
</table>

