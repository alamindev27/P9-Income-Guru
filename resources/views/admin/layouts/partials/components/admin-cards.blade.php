<div class="col-lg-4 col-xlg-3 col-md-5">
    <div class="card">
        <div class="card-body">
            <center class="m-t-30"> <img src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle avatar-image border" width="150" style="width: 150px; height:150px;" />
                <h4 class="card-title m-t-10">{{ auth()->user()->name }}</h4>
                <h6 class="card-subtitle">Adminstrator</h6>
            </center>
        </div>
        <div>
            <hr>
        </div>
        <div class="card-body">
            <small class="text-muted">Email address </small>
            <h6>{{ auth()->user()->email }}</h6>
            <small class="text-muted p-t-30 db">Started at</small>
            <h6>{{ Carbon\Carbon::parse(auth()->user()->created_at)->format('d m, Y') }}</h6>
        </div>
    </div>
</div>
