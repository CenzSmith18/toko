  <!-- Navbar -->
  @includeIf('layouts.navbar')
  <!-- /.navbar -->

  <!-- Section -->
  @includeIf('layouts.section1')
  <!-- End Section-->
<br><br>

<div class="container">
@foreach($kamar as $p)
  <h1> {{$p->type_label}}</h1>
  <h4>Fasilitas:</h4>

  <?php
$txt = $p->fasilitas;
 $test = str_replace(',', '<br>', $txt);
echo '<h5>' . $test  . '</h5>';
?>
<br><br>
<!--<img src="{{$p->type_gambar}}" class="img-fluid" alt="..."> -->
<img src="{{ asset($p->type_gambar) }}" style= "height: 550px; max-width: 50%;"class="img-fluid" alt="...">
<form action="/payment" method="GET">
  <div class="form-group">
  <input type="hidden"  name="id_type" class="form-control" value="<?= $p->id_type; ?>">
    <input type="hidden" name="name" class="form-control" value="<?= $p->type_label; ?>">
   
  <button type="submit" class="btn btn-primary">Checkout</button>
</form>
@endforeach