@extends('layouts.adminBase')

@section('title')
    <h3 class="text">Kiosk Details</h3>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="card-header d-flex justify-content-between">
            <h6>Update Kiosk Details</h6>
        </div>
        <div class="tabcontent">
            <form role="form" method="POST" action="{{ route('kiosk.updateKiosk', ['kiosk' => $data->kiosk_ID]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Name </span>
                    </div>
                    <div class="right">
                        <input class="form-control" type="text" id="" name="kiosk_name"
                            value="{{ $data->kiosk_name ?? '-' }}">
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Location *</span>
                    </div>
                    <div class="right">
                        <input class="form-control" type="text" id="" name="kiosk_location"
                            value="{{ $data->kiosk_location ?? '-' }}">
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Size *</span>
                    </div>
                    <div class="right">
                        <input class="form-control" type="text" id="" name="kiosk_size"
                            value={{ $data->kiosk_size ?? '-' }}>
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Rent *</span>
                    </div>
                    <div class="right">
                        <input class="form-control" type="text" id="" name="kiosk_rent"
                            value={{ $data->kiosk_rent ?? '-' }}>
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Rent Duration *</span>
                    </div>
                    <div class="right">
                        <select class="form-select" style="width: 50%;" name="kiosk_rentDuration">
                            <option selected hidden>{{ $data->kiosk_rentDuration ?? '-' }} months</option>
                            <option value="1">1 month</option>
                            <option value="2">2 months</option>
                            <option value="3">3 months</option>
                            <option value="4">4 months</option>
                            <option value="5">5 months</option>
                            <option value="6">6 months</option>
                            <option value="7">7 months</option>
                            <option value="8">8 months</option>
                            <option value="9">9 months</option>
                            <option value="10">10 months</option>
                            <option value="11">11 months</option>
                            <option value="12">12 months</option>
                        </select>
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Status </span>
                    </div>
                    <div class="right">
                            <select class="form-select" name="kiosk_status" value="{{ $data->app_status ?? '' }}"
                                style="width: 50%;">
                                <option selected value="{{ $data->kiosk_status ?? '' }}">{{ $data->kiosk_status ?? '' }}</option>
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="left">
                        <span>Kiosk Image </span>
                    </div>
                    <div class="right">
                        @if ($data->kiosk_img)
                            <img src="{{ Storage::url($data->kiosk_img) }}" style="width: 200px; height: 200px;">
                        @else
                            <p>No image available</p>
                        @endif<br>
                        <input type="file" id="myFiles" name="image" accept="image/*">
                    </div>
                </div>


                <div class="text-end mt-2">
                    <button type="reset" class="btn btn-info btn-sm float-left mb-0 mt-4">Reset</button>
                    <button type="submit" class="btn btn-info btn-sm float-left mb-0 mt-4">Save</button>
                </div>
            </form>
        </div>
        <a href="{{ route('kiosk.index') }}" class="btn btn-info btn-sm float-left mb-0 mt-4"
            style="background-color: gray">
            Kembali</a>
    </div>
@endsection
