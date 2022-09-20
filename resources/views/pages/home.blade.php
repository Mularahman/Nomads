@extends('layouts.app')

@section('title')
    NOMADS
@endsection

@section('content')
<!-- Header -->
<header class="text-center">
<h1>
    Explore the Beautiful World
    <br/>
    As Easy One Click
</h1>
<p class="mt-3">
    You will see beautiful
    <br/>
    moment you never see before
</p>
<a href="#populer" class="btn btn-get-started px-4 mt-4">
    Get Started
</a>
</header>

<!-- Statistik -->
<main>
<div class="container">
    <section class="section-stats row justify-content-center" id="stats">
        <div class="col-3 col-md-2 stats-detail">
            <h2>20K</h2>
            <P>Members</P>
        </div>
        <div class="col-3 col-md-2 stats-detail">
            <h2>12K</h2>
            <P>Countries</P>
        </div>
        <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <P>Hotel</P>
        </div>
        <div class="col-3 col-md-2 stats-detail">
            <h2>7K</h2>
            <P>Patners</P>
        </div>
    </section>
</div>

<section class="section-populer" id="populer">
    <div class="container">
        <div class="row">
            <div class="col text-center section-populer-heading">
                <h2>Wisata Populer</h2>
                <p>
                    Something that you never try
                    <br/> 
                    before in this world
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-populer-content" id="populercontent">
    <div class="container">
        <div class="section-populer-travel row justify-content-center">
           @foreach ($items as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-travel text-center d-flex flex-column" 
                    style="background-image: url('{{ $item->galleries->count() ? Storage::url
                        ($item->galleries->first()->image) : '' }}');">
                    
                    <div class="travel-countrie">{{$item->location}}</div>
                    <div class="travel-location">{{$item->title}}</div>
                    <div class="travel-button mt-auto">
                        <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
           @endforeach
           
        </div>
    </div>
</section>

<section class="section-network" id="networks">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>
                    Our Networks
                </h2>
                <p>
                    Companies are trusted us
                    <br/>
                    more than just a trip
                </p>
            </div>
            <div class="col-md-8 text-center">
                <img 
                src="/Frontend/images/partner.png" 
                alt="Logo Partner" 
                class="img-partner"
                >
            </div>
        </div>
    </div>
</section>

<section class="section-testimonial-heading" id="testimonialheading">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>
                    They're Loving Us
                </h2>
                <p>
                    Moments were giving them
                    <br />
                    the best experience
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-testimonial-content">
    <div class="container">
        <div class="section-populer-travel row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                        <img src="/Frontend/images/testimonial-1.png" 
                        alt="user" 
                        class="mb-4 rounded-circle"
                        >
                        <h3 class="mb-4" style="font-weight: bold;">Mula Rahman</h3>
                        <p class="testimonial">
                            " It was glorious and i could
                            not stop to say wohooo for
                            every single moment
                            Dankeeeee "
                        </p>
                    </div>
                    <hr />
                    <p class="trip-to mt-2">
                        Trip to Ubud
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                        <img src="/Frontend/images/testimonial-2.png" 
                        alt="user" 
                        class="mb-4 rounded-circle"
                        >
                        <h3 class="mb-4" style="font-weight: bold;">Janne</h3>
                        <p class="testimonial">
                            " I loved it when the weves
                            was shaking harder - I was
                            scared too "
                        </p>
                    </div>
                    <hr />
                    <p class="trip-to mt-2">
                        Trip to Karimun Jawa
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                        <img src="/Frontend/images/testimonial-3.png" 
                        alt="user" 
                        class="mb-4 rounded-circle"
                        >
                        <h3 class="mb-4" style="font-weight: bold;">James Bond</h3>
                        <p class="testimonial">
                            " The trip was amazing and
                            I saw something beautiful in
                            that Island that makes me
                            want to learn more "
                        </p>
                    </div>
                    <hr />
                    <p class="trip-to mt-2">
                        Trip to Nusa Penida
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                    I Need Help
                </a>
                <a href="{{ route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</section>
</main>
@endsection