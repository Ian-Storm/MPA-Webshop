@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shoppingcart</div>
                <div class="card-body">
                   @foreach($articles as $item)<p>{!!$item->name!!}</p><p>{!!$item->description!!}</p><p>Price {!!$item->price!!} euro</p><p>Amount: {!!$all[0]->quantity!!}</p><br>@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection