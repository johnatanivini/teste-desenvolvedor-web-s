
   

@if (session('success'))
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-body">
            <div class="alert alert-success" role="alert">
                    {{ session('success') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endif

@if ($errors->any())
<div class="row justify-content-center mb-10">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif