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

<!-- REPSONSIVE CRUD -->
@foreach ($pizzas as $pizza)
    <button class="collapsible">{{$pizza->name}}</button>
    <div class="content">
        <p>Ingredients:
            @foreach ($pizza->ingredients as $ingredient)
                {{ $ingredient->name }},
            @endforeach
        </p>
        <p>Price: €10,00</p>
        <b>Size</b>
        <br>
        <br>
        <select id="size">
            <option>Small</option>
            <option selected="selected">Medium</option>
            <option>Large</option>
        </select>
        <br>
        <br>
        <b>Amount</b>
        <br>
        <br>
        <select id="amount">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
        </select>
        <br>
        <br>
        <b>Ingredients</b>
        <br>
        <br>
        <select>
            @foreach ($ingredients as $ingredient)
            <option>
                {{ $ingredient->name }}
            </option>
            @endforeach
        </select>
        <br>
        <br>
        <button id="create"><a href="">Add Ingredient</a></button>
        <button id="delete"><a href="">Remove Ingrediënt</a></button>
        <p>Total Price: €10,00</p>
        <button id="create"><a href="">Add To Cart</a></button>
    </div>
@endforeach

<div id="paginate">{!! $pizzas->links() !!}</div>

<!-- SHOPPING CART -->
<div id="order">
    <h2>Order</h2>
    <p>Total Price:</p>
    <a href="orders"><button id="create">Complete</a></button>
</div>


<!-- FOOTER -->
<footer>
    <p>Copyright Stonks-Pizza 2023-2024</p>
</footer>

<!-- JS SCRIPTS -->
<script src="js/script.js"></script>

@endsection
