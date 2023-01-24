@extends('pizzas.layout')

@section('content')
<!-- NAVIGATION -->
<header>
    <a href="pizzas">Stonks-pizza</a>
</header>

<!-- MESSAGE IF DATABASE CONNECTION SUCCESSFULL -->
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<!-- CONTENT -->
@foreach ($users as $user)
    {{ $user->orders[0]->receipt }}
@endforeach

<!-- FOOTER -->
<footer>
    <p>Copyright Stonks-pizza 2023-2024</p>
</footer>

<!-- JS SCRIPTS -->
<script src="js/script.js"></script>

@endsection
