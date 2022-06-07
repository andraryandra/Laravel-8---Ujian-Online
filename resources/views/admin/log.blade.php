@extends('layouts.appAdmin')
@section('title', 'Log Message')
@section('content')

<!-- Begin Page Content -->
{{-- <h1>true</h1> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Authentication Log</div>
                {{-- <div class="card-body">
                    <table class="table" id="example">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Authentication</th>
                            <th scope="col">Login at</th>
                            <th scope="col">Login Successfully</th>
                            <th scope="col">Logout at</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($usersLogArray as $key => $item)
                            @if($item->authenticatable_id == Auth::user()->id && Auth::user()->sekolah_asal)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->authenticatable_id }}</td>
                                <td>{{ Carbon\Carbon::parse($item->login_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                                <td>{{ $item->login_successful  == true ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->logout_at == NULL ? '-' : Carbon\Carbon::parse($item->logout_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered" id="example" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">IP Address</th>
                                    <th scope="col">Authentication</th>
                                    <th scope="col">Login at</th>
                                    <th scope="col">Login Successfully</th>
                                    <th scope="col">Logout at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                            @endphp

                            @foreach ($authentication_logs as $item)
                            @if($item->authenticatable_id == Auth::user()->id && Auth::user()->sekolah_asal)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ Carbon\Carbon::parse($item->login_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                                <td>{{ $item->login_successful  == true ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->logout_at == NULL ? '-' : Carbon\Carbon::parse($item->logout_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                            </tr>
                            @endif
                            @endforeach
                            {{-- @foreach ($usersLogArray as $key => $item)
                            @if($item->authenticatable_id == Auth::user()->id && Auth::user()->sekolah_asal)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->authenticatable_id }}</td>
                                <td>{{ Carbon\Carbon::parse($item->login_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                                <td>{{ $item->login_successful  == true ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->logout_at == NULL ? '-' : Carbon\Carbon::parse($item->logout_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                            </tr>
                            @endif

                            @if($item->authenticatable_id && Auth::user()->role == "superadmin")
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->authenticatable_id }}</td>
                                <td>{{ Carbon\Carbon::parse($item->login_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                                <td>{{ $item->login_successful  == true ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->logout_at == NULL ? '-' : Carbon\Carbon::parse($item->logout_at)->isoFormat('D MMMM YYYY h:mm A') }}</td>
                            </tr>
                            @endif
                            @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

