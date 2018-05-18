@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shoppingcart</div>
                <div class="card-body">
                   @for($item = 0; $item < count($articles); $item++)
                   <p>{!!$articles[$item]->name!!}</p><p>{!!$articles[$item]->description!!}</p><p>Price {!!$articles[$item]->price!!} euro</p>
                   <p>Amount: {!!$all[$item]->quantity!!}</p><br>
                   @endfor
                </div>
            </div>
           <a href="{!!url('/webshop')!!}">Back</a>
        </div>
    </div>
</div>
@endsection

