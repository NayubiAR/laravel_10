<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                {{-- Jika route nya menggunakan name mangka kita menggunakan helper Route --}}
                {{-- Jika route nya tidak menggunakan name mangka kita menggunakan helper Request dan Url --}}

                {{-- is disini adalah acuan jika kita berada pada route tersebut mangka simbol ? adalah if nya  --}}
                {{-- tanda : menjadi else nya --}}
                <a class="{{ (Route::is('dashboard')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
<<<<<<< HEAD
                <a class="{{ (Route::is('feed')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
=======
>>>>>>> d396b91257532fbd839408e4a71c7c89206b9bc6
                <a class="{{ (Route::is('terms')) ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href=" {{ Route('profile') }}">View Profile </a>
    </div>
</div>
