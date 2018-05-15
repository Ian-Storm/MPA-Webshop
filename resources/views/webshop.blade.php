@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    @foreach($categories as $category)<a href="{{url('/webshop/category/' . $category->category_id)}}">{!!$category->name!!}</a><br>@endforeach
                    <div class="card-header">Products</div>
                    @foreach($articles as $article)<a href="{{url('/webshop/article/' . $article->article_id)}}"><button>{{$article->name}}</button></a><a href="{{url('/cart/article/' . $article->article_id)}}"><button>Add to cart</button></a><br>@endforeach
                </div>
            </div>
            <a href="{{url('/cart/')}}"><button>To the ShoppingCart</button></a>
        </div>
    </div>
</div>
@endsection
