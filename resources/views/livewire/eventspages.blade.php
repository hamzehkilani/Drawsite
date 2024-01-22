<div>
    <link rel="stylesheet" href="{{asset('../css/eventpages.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <div class="event " >
    <div class="container mb-5" style="margin-top:20px">
        <div class="row">
            <div class="col-lg-12 ">
                <nav class="wow fadeInDown  animated" data-animation="fadeInDown animated" data-delay=".2s" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link  {{$daynumber==1 ? "active show" :''}}" id="nav-home-tab" data-toggle="tab" href="#one" role="tab" aria-selected="true" wire:click="changedate({{1}})">
                            <div class="nav-content">
                                <strong>First Day</strong>
                                <span>{{$firstday}}</span>
                            </div>
                        </a>
                        <a class="nav-item nav-link {{$daynumber==2 ? "active show" :''}}" id="nav-profile-tab" data-toggle="tab" href="#two" role="tab" aria-selected="false"  wire:click="changedate({{2}})">
                            <div class="nav-content">
                                <strong>Second Day</strong>
                                <span>{{$secondday}}</span>
                            </div>
                        </a>
                        <a class="nav-item nav-link {{$daynumber==3 ? "active show" :''}}" id="nav-contact-tab" data-toggle="tab" href="#three" role="tab" aria-selected="false"  wire:click="changedate({{3}})">
                            <div class="nav-content">
                                <strong>Third Day</strong>
                                <span>{{$Third}}</span>
                            </div>
                        </a>
                        <a class="nav-item nav-link {{$daynumber ==4 ? "active show" :''}}" id="nav-contact-tab2" data-toggle="tab" href="#four" role="tab" aria-selected="false "  wire:click="changedate({{4}})">
                            <div class="nav-content">
                                <strong>Fourth Day</strong>
                                <span>{{$Fourth}}</span>
                            </div>
                        </a>
                    </div>
                </nav>
            @foreach ($events as $event)
        
                <div class="tab-content py-3 px-3 px-sm-0 wow fadeInDown  animated" data-animation="fadeInDown animated" data-delay=".2s" id="nav-tabContent" style="visibility: visible; animation-name: fadeInDown;">
                    <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- row loop -->
                        <div class="row mb-30">
                            <div class="col-lg-2">
                                <div class="user">
                                    <div class="title">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="img">
                                        <h5>Rosalina William</h5>
                                        <p>UX Deisgn</p>
                                    </div>
                                    <ul>
                                        <li>Coffe &amp; Snacks</li>
                                        <li>Video Streming</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="event-list-content fix">
                                    <ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class="">
                                        <li>Waterfront Hotel, London</li>
                                        <li>9.30 - 10.30 AM</li>
                                    </ul>
                                    <h2>UX Design Trend Party 2019</h2>
                                    <p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
                                    <a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
                                    <a href="#" class="btn mt-20">Read More</a>
                                    <div class="crical"><i class="fal fa-video"></i> </div>
                                </div>
                            </div>
                        </div>
                        <!-- row loop -->
                    
                    </div>
                </div>
            @endforeach
        </div>

            @if(count($events)>0)
            <div class="col-lg-12 justify-content-center text-center">
                <a href="#" class="btn mt-20 mr-10">More Program  +</a>
            </div>

            @else 
            <div class="no-item">
                <strong> Sorry There Is No Events Today !</strong>
            </div>
            @endif
        </div>
    </div>
    </div>
</div>
