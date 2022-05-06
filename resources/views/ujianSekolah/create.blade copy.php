@extends('layouts.app')
@section('title' ,'Start')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/radio-style.css') }}">

<div class="container-fluid">
  <div class="card">
    <div class="card-header ">
      <h3 class="fw-bold btn btn-info text-white"><i class="bi bi-book"></i> Ujian online </h3>
    </div>
    <div class="card-body">
      <h5 class="card-title btn btn-success font-monospace">Identitas Siswa:</h5>
      <div class="card w-auto border border-3 border-success rounded shadow">
        <div class="card-body">
          <p class="fs-5 font-monospace text-capitalize">Nama : {{ Auth::User()->name ?? "" }}</p>
          <p class="fs-5 font-monospace text-uppercase">Kelas : {{ Auth::User()->kelas->name_kelas ?? "" }}</p>
          <p class="fs-5 font-monospace text-uppercase">Sekolah : {{ Auth::User()->sekolah_asal ?? "" }}</p>
        </div>
      </div>

      <div class="card mt-3">
        <h5 class="card-header">Ujian Online</h5>
        <div class="card-body">
           <form action="/ujianSekolah/store" method="post">
                @csrf

            {{-- <div class="m-3">
                <label for="id_kelas" class="pb-2 fw-bold">{{ __('Kelas') }}</label>
                <input readonly type="text" class="form-control" placeholder="Kelas" name="id_kelas" value="{{ Auth::user()->kelas->name_kelas }}" required>
            </div>   --}}
            <div class="m-3">
              <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
              <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}" required>
          </div>
          {{-- <div class="form-group m-3 ">
            <label for="id_category" class="fw-bold "> Category</label><br>
            <select class="form-select " data-style="btn-success" name="id_category" id="id_category">
                @foreach($categori as $id => $categories)
                    <option value="{{ $id }}">{{ $categories }}</option>
                    @endforeach
            </select>
        </div> --}}

        @foreach ($post as $posts)
        <div class="m-3">
            <label for="id_soal_ujian" class="pb-2 fw-bold">{{ __('ID Post') }}</label>
            <input readonly type="text" class="form-control" placeholder="ID Post" name="id_soal_ujian" value="{{ $posts->id }}" required>
        </div>

        <div class="m-3">
            <label for="id_category_ujian" class="pb-2 fw-bold">{{ __('ID Category') }}</label>
            <input readonly type="text" class="form-control" placeholder="ID Category" name="id_category_ujian" value="{{ $posts->category->id }}" required>
        </div>

        @php
            $no = 1;
        @endphp
        <div class="m-3">
          <p class="card-text fs-5">{{ $no++ }}. {{ $posts->soal_ujian }}</p>
        </div>


          <div class="form-group m-3 ">
            <label for="id_category" class="fw-bold "> Jawaban:</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="id_jawaban" id="inlineRadio1" value="{{ $posts->pilihan_a }}">
              <label class="form-check-label" for="inlineRadio1"> {{ $posts->pilihan_a }}</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="id_jawaban" id="inlineRadio2" value="{{ $posts->pilihan_b }}">
              <label class="form-check-label" for="inlineRadio2"> {{ $posts->pilihan_b }}</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="id_jawaban" id="inlineRadio3" value="{{ $posts->pilihan_c }}">
              <label class="form-check-label" for="inlineRadio3"> {{ $posts->pilihan_c }}</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="id_jawaban" id="inlineRadio4" value="{{ $posts->pilihan_d }}">
              <label class="form-check-label" for="inlineRadio4"> {{ $posts->pilihan_d }}</label>
            </div>

            {{-- <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jawaban" id="inlineRadio4" value="D">
              <label class="form-check-label" for="inlineRadio4">D. {{ $posts->pilihan_d }}</label>
            </div> --}}
          </div>

            {{-- <!-- Default checked radio -->
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="pilihan_d" id="flexRadioDefault4" />
              <label class="form-check-label" for="flexRadioDefault4"> {{ $posts->pilihan_d }} </label>
            </div> --}}
            @endforeach
        </div>
      </div>

      <div class="mt-3 ml-3 float-end">
        <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
    </div>
    </form>
      {{-- <a href="{{ url('/ujianSekolah-selesai') }}" class="btn btn-primary mt-4 shadow-lg"><i class="bi bi-box-arrow-in-right fa-2x"></i> Selesai</a> --}}


    </div>
  </div>
</div>
@endsection

