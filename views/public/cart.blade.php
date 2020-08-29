@extends('vinyl-graphics::layout')
@section('title', 'Cart')
@section('content')
<div class="container">
    @if(!count($items))
        <div class="alert alert-warning">
            You have no items in your cart.
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Font</th>
                    <th scope="col">Color</th>
                    <th scope="col">Border Color</th>
                    <th scope="col">Text</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Cost</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->font->name }}</td>
                        <td>{{ $item->color->name }}</td>
                        <td>{{ $item->borderColor->name }}</td>
                        <td>{{ $item->text }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->displayPrice }}</td>
                        <td><a href="{{ route('edit', ['id' => $item->id]) }}"><small>edit</small></a></td>
                        <td><a href="{{ route('delete', ['id' => $item->id]) }}"><small>remove</small></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">Subtotal: {{ $order->displaySubTotal }}</div>
        <div class="text-right">Shipping: {{ $order->displayShipping }}</div>
        <div class="text-right"><strong>Total: {{ $order->displayTotal }}</strong></div>
    @endif
    <div class="row mt-5">
        <div class="col-sm">
            <a class="btn btn-secondary btn-lg btn-block" href="{{ route('home') }}">Continue Shopping</a>
        </div>
        @if(count($items))
            <div class="col-sm">
                <a class="btn btn-primary btn-lg btn-block" href="{{ route('checkout') }}">Checkout</a>
            </div>
        @endif
    </div>
</div>
@endsection
