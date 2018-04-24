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
                    <button>Add to cart</button>
                </div>
            </div>
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</div>
@endsection