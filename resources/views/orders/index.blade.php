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
@foreach ($klanten as $klant)
    {{ $klant->bestellingen[0]->bon }}
@endforeach

<!-- FOOTER -->
<footer>
    <p>Copyright Stonks-pizza 2023</p>
</footer>

<!-- JS SCRIPTS -->
<script src="js/script.js"></script>

@endsection
