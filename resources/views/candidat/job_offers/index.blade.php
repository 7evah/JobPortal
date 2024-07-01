@extends('layouts.appo')

@section('title', 'Job Offers')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-5">Job Offers</h1>
        @auth
            @if (is_null(Auth::user()->CVpath))
                <div class="alert alert-warning" role="alert">
                    Please <a href="{{ route('candidat.profile.edit') }}">edit your profile</a> to upload your CV before applying for any job.
                </div>
            @endif
        @endauth
        <div class="row">
            @foreach($jobOffers as $jobOffer)
                @if($jobOffer->status == 'active')
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2 class="card-title text-center">{{ $jobOffer->title }}</h2>
                                <p class="card-text"><strong>Description:</strong> {{ Str::limit($jobOffer->description, 100) }}</p>
                                <p class="card-text"><strong>Location:</strong> {{ $jobOffer->location }}</p>
                                <p class="card-text"><strong>Contract Type:</strong> {{ $jobOffer->contract_type }}</p>
                                @auth
                                    @if (!is_null(Auth::user()->CVpath))
                                        <form action="{{ route('candidat.job-offers.apply', $jobOffer) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-block">Apply</button>
                                        </form>
                                    @else
                                        <button type="button" class="btn btn-secondary btn-block" disabled>Upload CV to Apply</button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-block">Login to Apply</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
