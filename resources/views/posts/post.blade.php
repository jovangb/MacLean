@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <post :post="{{$post}}" :ep="{{$ep}}"></post>
        </div>
    </div>    
</div>
@endsection
