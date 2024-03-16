@extends('layouts.app')
@section('content')
<div class="container marketing">
  <h1>
    Crea el seguimiento de un producto
</h1>
  <br>
  <table class="table table-striped">
    <thead >
      <tr>
        <th scope="col">#</th>
        <th scope="col">Imagen</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoría</th>
        <th scope="col">Marca</th>
        <th scope="col">Descripción</th>
        <th scope="col">Generar QR</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td>							<img src="{{ asset($product->pic) }}" alt="" style="width:50%;max-width: 50px;"></td>
        <td>{{$product->name}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->marca}}</td>
        <td>{{$product->description}}</td>
        <td class="fs-4 mb-3" ><a href="/createqr?id={{$product->id}}"style="color:green" class="bi bi-plus-square"></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- <form action="/createqr" method='get'>
    <label for="fname">Numero del producto:</label><br>
    <input type="number" id="product_id" name="id" required><br>
    <br>
    <input type="submit" value="Generar QR">
  </form>  -->

  @if(isset($ret))
  <br><br>
    <img id='qr' src="{{ asset('qr/qr_'.$ret.'.png' ) }}"  class="center" >
    <div class="" >
      <button onclick="saveImage()" style="margin:auto;display:block;">Guardar QR</button>
    </div>
    <script>
      function saveImage(){
        var imgElement = document.getElementById('qr');
        var link = document.createElement('a');
        link.href = imgElement.src;
        link.download = 'qr.jpg';
        link.click();
      }
    </script>
  @endif

</div>
@endsection