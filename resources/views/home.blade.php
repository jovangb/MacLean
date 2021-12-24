@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-center"> 
            <form action="/new-post">
                <button type="submit" class="btn btn-primary btn-lg col-12">Nuevo +</button>    
            </form>                               
        </div>
    </div>
    <hr>
    <post-card></post-card>
</div>
@endsection
