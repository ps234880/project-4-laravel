<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    @php
    (isset($_SESSION['fiets1'])){
        "<h2>'.$_SESSION['fiets1'].'</h2>"
    }
    @endphp

    <script src="js/script.js">
        CreateReceipt();
    </script>

    <x-slot name="footer">
        <h2 class="font-semibold text-l text-gray-600  leading-tight">
            {{ __('Stonks Pizza') }}
        </h2>
    </x-slot>
</x-app-layout>
