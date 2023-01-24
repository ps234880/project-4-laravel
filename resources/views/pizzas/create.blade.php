@extends('pizzas.layout')

@section('content')
<!-- NAVIGATION -->
<header>
    <a class="active-link" href="#">Stonks-pizza</a>
    <a href="javascript:order();"><img id="cart" src="img/shopping-cart-icon.png"></a>
</header>

<!-- MESSAGE IF DATABASE CONNECTION SUCCESSFULL -->
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<h1>test</h1>
