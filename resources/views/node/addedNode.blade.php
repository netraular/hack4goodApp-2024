@extends('layouts.app')
@section('content')

<div class="container marketing">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
			<div class="" style="font-size:40px; text-align:center">
				{{$message}}
			</div>
			<button id="redirect" class="btn btn-dark" style="margin: auto; display: block;">
				Home
			</button>
			<script>
				document.getElementById("redirect").addEventListener("click", redirect);
				function redirect(){
					window.location = 'https://eco2.netshiba.com/';
				}
			</script>
        </div>
    </div>
@endsection