@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left_sidebar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.submit')
            <hr>
            {{-- Disini menggunakan loop forelse yang dimana jika loop ini kosong mangka akan mengarah ke bagian empty
            Bisa juga menggunakan loop foreach namun harus menggunakan if else jika ingin data kosong diarah kan ke else --}}
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.card')
                </div>
            @empty
                <p class="text-center mt-4">No result found.</p>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')

            @include('shared.follow_box')
        </div>
    </div>
@endsection
