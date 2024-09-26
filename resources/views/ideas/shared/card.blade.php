<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a>
                    </h5>
                </div>
            </div>
            @auth
            <div>
                <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}"> Edit </a>
                    <a href="{{ route('ideas.show', $idea->id) }}"> View </a>
                    <button class="btn btn-danger btn-sm ms-2"> X </button>
                </form>
            </div>
            @endauth
            @guest
            <a href="{{ route('ideas.show', $idea->id) }}"> View </a>
            @endguest
        </div>
    </div>
    <div class="card-body">
        {{-- Mark syntax dari php 8 yang dimana digunakan jika tidak ada variable yang dicari mangka nilai nya akan menjadi false --}}
        @if ($editing ?? false)
        <form action="{{ route('ideas.update', $idea->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"> {{ $idea->content }} </textarea>
                @error('content')
                <span class="fs-6 text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark btn-sm mb-2"> Update </button>
            </div>
        </form>
        @else
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
<<<<<<< HEAD
                {{-- toDateString digunakan untuk menampilkan tanggal dan waktu --}}
                {{-- diffForHumans digunakan untuk menampilkan berapa lama sebuah data terbuat--}}
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comment_box')
=======
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comment_box')
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
    </div>
</div>
