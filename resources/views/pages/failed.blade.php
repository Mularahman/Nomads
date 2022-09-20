@extends('layouts.success')

@section('title')
    Checkout Success
@endsection

@section('content')
    <main>
        <div class="section-success d-flex align-item-center">
            <div class="col text-center">
                    <img src="/Frontend/images/success.png" alt="">
                    <h1>
                        Oops!
                    </h1>
                    <p>
                        Your transaction is failed 
                        <br />
                        please contact our representive if this problem occurs
                    </p>
                    <a href="{{ route('home')}}" class="btn btn-home-page mt-3 px-5">
                        Home Page
                    </a>
            </div>
        </div>
    </main>
@endsection
