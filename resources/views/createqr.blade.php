<!-- seleciona un id
generar qr -->
<form action="/createqr" method='get'>
  <label for="fname">Product number:</label><br>
  <input type="number" id="product_id" name="id" required><br>
  <input type="submit" value="Submit">
</form> 

@if(isset($ret))
  <img src="{{ asset('qr/qr_'.$ret.'.png' ) }}" alt="">
@endif