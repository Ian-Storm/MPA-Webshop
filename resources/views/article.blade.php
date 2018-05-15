@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!!$article->name!!}</div>

                <div class="card-body">
                    {!!$article->description!!}<br>
                    €{!!$article->price!!}
                    <a href="{{url('/cart/article/' . $article->article_id)}}"><button>Add to cart</button></a>
                </div>
            </div>
            <a href="{!!url('/webshop')!!}">Back</a>
        </div>
    </div>
</div>
@endsection