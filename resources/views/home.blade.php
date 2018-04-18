@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                    Now go and do some shopping!
                    <div class="links">
                    <a href="http://ao-webshop.local/webshop">To the webshop!</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
