@extends('layouts.app')

@section('content')
    <section>
        <form action="{{url('/client/save/')}}" method="post">
        @csrf
            <input type="text" name="name" placeholder="Name"><br>
            <input type="text" name="street" placeholder="Street">
            <input type="number" name="housenumber" placeholder="Housenumber"><br>
            <input type="text" name="state" placeholder="State"><br>
            <input type="text" name="country" placeholder="Country"><br>
            <input type="number" name="phone" placeholder="Phone">
            <button type="submit" placeholder="Submit">Submit</button>
        </form>
    </section>
@endsection