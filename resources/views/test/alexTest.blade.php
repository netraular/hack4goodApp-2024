@extends('layouts.app')

@section('content')

@if(isset($result))
    {{$result}}
@endif
<form id = "form_alex" method="post" action="/form_alex">
    @csrf
    <input id = "coordX" name = "coordX" type="number" value = "10"> 
    <input id = "coordY" name = "coordY" type="number" value = "10"> 
    <button type="submit"> Script python </button>

</form>

<script>
    function submitform(event){
        document.getElementById("form_alex").submit();
    }
</script>

@endsection