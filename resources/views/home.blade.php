@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <!-- Check if the authenticated user is an admin -->
                    @if (auth()->user()->is_admin == 1)
                    <!-- Display a link to the admin routes if the user is an admin -->
                    <a href="{{ url('admin/routes') }}">Admin</a>

                    @elseif (auth()->user()->is_technical == 2)
                    <a href="{{ url('staff/routes') }}">Technical</a>

                    @elseif (auth()->user()->is_bursary == 3)
                    <a href="{{ url('staff/routes') }}">Bursary</a>

                    @elseif (auth()->user()->is_pupuk == 4)
                    <a href="{{ url('staff/routes') }}">Pupuk</a>

                    @else
                    <!-- Display a panel heading for normal users -->
                    <a href="{{ url('user/routes') }}">User</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection