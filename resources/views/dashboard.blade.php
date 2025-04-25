@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">My Services</h5>
                                    <p class="card-text">View and manage your services</p>
                                    <a href="{{ route('services.index') }}" class="btn btn-primary">View Services</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Book Demo</h5>
                                    <p class="card-text">Schedule a demo of our services</p>
                                    <a href="{{ route('book-demo') }}" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>

                        @if(Auth::user()->is_admin)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Admin Panel</h5>
                                    <p class="card-text">Access admin controls</p>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go to Admin</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 