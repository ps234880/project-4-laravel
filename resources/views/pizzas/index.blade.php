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
    <button class="collapsible">{{$pizza->naam}}</button>
    <div class="content">
        <p>Ingrediënten:
            @foreach ($pizza->ingrediënten as $ingrediënt)
                {{ $ingrediënt->naam }},
            @endforeach
        </p>
        <p>Prijs per stuk: €10,00</p>
        <b>Formaat</b>
        <br>
        <br>
        <select id="formaat">
            <option>Klein</option>
            <option selected="selected">Normaal</option>
            <option>Groot</option>
        </select>
        <br>
        <br>
        <b>Aantal</b>
        <br>
        <br>
        <select id="aantal">
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
        <b>Ingrediënten</b>
        <br>
        <br>
        <select>
            @foreach ($ingrediënten as $ingrediënt)
            <option>
                {{ $ingrediënt->naam }}
            </option>
            @endforeach
        </select>
        <br>
        <br>
        <button id="create"><a href="">Ingrediënt Toevoegen</a></button>
        <button id="delete"><a href="">Ingrediënt Verwijderen</a></button>
        <p>Totaalprijs: €10,00</p>
        <button id="create"><a href="">Pizza Toevoegen</a></button>
    </div>
@endforeach

<div id="paginate">{!! $pizzas->links() !!}</div>

<!-- SHOPPING CART -->
<div id="order">
    <h2>Bestelling</h2>
    <p>Totaalprijs:</p>
    <a href="bestellingen"><button id="create">Afronden</a></button>
</div>


<!-- FOOTER -->
<footer>
    <p>Copyright Stonks-pizza 2023</p>
</footer>

<!-- JS SCRIPTS -->
<script src="js/script.js"></script>

@endsection
