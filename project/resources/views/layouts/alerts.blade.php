
   

@if (session('status'))
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-body">
            <div class="alert alert-success" role="alert">
                    {{ session('status') }}
            </div>
            </div>
        </div>
    </div>
</div>
@endif