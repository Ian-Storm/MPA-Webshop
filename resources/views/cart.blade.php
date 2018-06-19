@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shoppingcart</div>
                <div class="card-body">
                 @for($item = 0; $item < count($articles); $item++)
                	<form action="{{action('ShoppingCartController@updateItem')}}" method="post">
                	{{csrf_field()}}
	                   <p>{!!$articles[$item]->name!!}</p><p>{!!$articles[$item]->description!!}</p><p>Price {!!$articles[$item]->price!!} euro</p>
	                   <input type="hidden" name="id" value="{!!$articles[$item]->article_id!!}">
	                   <input type="number" min="1" max="8" value="{!!$all[$item]->quantity!!}" name="quantity">
	                   <input type="submit" value="Change amount"><a href="{{url('/cart/remove/' . $articles[$item]->article_id)}}"> Delete</a><br><br><br>
                   	</form>
                   	@endfor
                   Total {!!$total!!} Euro <a style="float:right" href="">Order Now</a>
                </div>
            </div>
           <a href="{!!url('/webshop')!!}">Back</a>
        </div>
    </div>
</div>
@endsection

