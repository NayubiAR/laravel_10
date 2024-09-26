@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_sidebar')
    </div>
    <div class="col-6">
        @include('shared.success_message')
        <div class="mt-3">
            @include('ideas.shared.card')
        </div>
    </div>
    <div class="col-3">
        @include('shared.search_bar')

        @include('shared.follow_box')
    </div>
</div>
<<<<<<< HEAD
@endsection 
=======
@endsection
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
