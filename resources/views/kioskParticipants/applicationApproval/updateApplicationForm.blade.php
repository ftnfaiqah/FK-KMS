@extends('layouts.participantBase')

@section('title')
    <h3 class="text">Application and Approval</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Update Kiosk Application</h6>
        </div>
        <br><br>
        <p><b>Kiosk Owners Details</b></p>
        <div class="tabcontent">

            <form role="form" method="POST"
                action="{{ route('application.updateApp', ['application' => $datas->app_ID]) }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $datas->user_ID }}">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col">
                        <span>Owner's Name*</span>
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name"
                            name="user_name" value="{{ $datas->user->name ?? '' }}">
                    </div>
                    <div class="col">
                        <span>Owner's IC Number*</span>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"
                            name="user_icNum" value="{{ $datas->user->icNum ?? '' }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span>Owner's Phone No.*</span>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name"
                            name="user_phoneNum" value="{{ $datas->user->phoneNum ?? '' }}">
                    </div>
                </div>

        </div>
        <br><br>
        <p><b>Kiosk Owners Details</b></p>
        <div class="tabcontent">

            <div class="row" style="margin-bottom: 20px">
                <div class="col">
                    <span><b>Choose Kiosk *</b></span>
                    <select class="form-select" name="kiosk_id" style="width: 50%;" value="{{ $datas->kiosk->kiosk_name }}">
                        <option selected value="{{ $datas->kiosk->kiosk_ID ?? '' }}">{{ $datas->kiosk->kiosk_name ?? '-' }}
                        </option>
                        @foreach ($kiosks as $kiosk)
                            @if ($kiosk->kiosk_status == 'Available')
                                <option value="{{ $kiosk->kiosk_ID }}">{{ $kiosk->kiosk_name }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
            </div>
        </div>

        <div class="text-end mt-2">
            <button type="reset" class="btn btn-info btn-sm float-left mb-0 mt-4">Reset</button>
            <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Submit</button>
        </div>
        </form>
    </div>
    <a href="{{ route('application.index') }}" class="btn btn-info btn-sm float-left mb-0 mt-4"
        style="background-color: gray;  border: 1px solid gray;">
        Kembali</a>
    </div>
@endsection
