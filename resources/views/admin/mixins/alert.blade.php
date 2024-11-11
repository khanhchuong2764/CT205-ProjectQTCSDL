@if (Session::has('success'))
    <div class="alert alert-success" show-alert>
        {{Session::get('success')}} <i class="fa-solid fa-xmark closedalert" alert-close></i>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger" show-alert>
        {{Session::get('error')}} <i class="fa-solid fa-xmark closedalert" alert-close></i>
    </div>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" show-alert>
                {{ $error }} <i class="fa-solid fa-xmark closedalert" alert-close></i>
            </div>
        @endforeach
    </ul>
@endif