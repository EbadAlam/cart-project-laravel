@extends('layout.app')
@section('content')
        <section class="container content-section">
            <div class="shop-items">
                @if (count($item) > 0)
                @foreach ($item as $key => $singleItem)
                <div class="shop-item">
                    <span class="shop-item-title">{{ $singleItem->name }}</span>
                    <img class="shop-item-image" src="{{ asset( $singleItem->image ) }}">
                    <div class="shop-item-details">
                        <span class="shop-item-price">${{ $singleItem->price }}</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                @endforeach
                @else
                <h2>No records!</h2>
                @endif
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">

            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>
@endsection