    <div class="row mt-10">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"     style="background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;">Users count :{{$userscount}} </div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: white;
                ">
                    <a class="small text-white stretched-link" href="{{route('admin.users')}}" style="color: #0000ffb3 !important;">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"     style="background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;">Admin count : {{$admincount}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: white;
                ">
                    <a class="small text-white stretched-link" href="{{route('admin.users')}}?sortBy=role&sortDir=DESC" style="color: #0000ffb3 !important;">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"     style="background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;">Painters count : {{$paintercount}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: white;
                ">
                    <a class="small text-white stretched-link" href="{{route('admin.Painters')}}" style="color: #0000ffb3 !important;">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"     style="background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;">Events count : {{$eventscount}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: white;
                ">
                    <a class="small text-white stretched-link" href="{{route('admin.events')}}" style="color: #0000ffb3 !important;">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"     style="background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;">blocked count : {{$blockedcount}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: white;
                ">
                    <a class="small text-white stretched-link" href="{{route('admin.users')}}?sortBy=status&sortDir=DESC"  style="color: #0000ffb3 !important;">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"     style="background: linear-gradient( 45deg, rgb(73 76 75 / 55%), rgba(91, 14, 214, 0.7) 100% ) !important;">Products count : {{$Productscount}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: white;
                ">
                    <a class="small text-white stretched-link" href="{{route('admin.products')}}?sortBy=status&sortDir=DESC"  style="color: #0000ffb3 !important;">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
      
    </div>
