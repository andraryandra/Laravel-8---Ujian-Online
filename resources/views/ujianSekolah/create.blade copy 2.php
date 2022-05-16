@extends('layouts.app')
@section('title' ,'Start')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/radio-style.css') }}">


@if ( $DisujianKelases->status == 1 && $DisujianKelases->id_kelas == '7' && Auth::user()->kelas->name_kelas >= '7-A' && Auth::user()->kelas->name_kelas <= '7-Z')

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
                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}">
            </div>

            <div class="m-3">
                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}">
            </div>

            <div class="m-3">
                <label for="id_sekolah_asal" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah_asal" value="{{ Auth::user()->sekolah_asal }}">
            </div>

            @if( $DisujianKelases->id != '/ujianSekolah-create{{ $DisujianKelases->id }}' )
            <div class="m-3">
                <label for="id_category_ujian" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_category_ujian" value="{{ $DisujianKelases->categoryUjian->name_category_ujian }}">
            </div>

            <div class="m-3">
                <label for="id_category_pelajaran" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Mapel" name="id_category_pelajaran" value="{{ $DisujianKelases->category->name_category }}">
            </div>
            @endif --}}

            <div class="m-3">
                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}">
            </div>


            <div class="m-3">
                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}">
            </div>

            <div class="m-3">
                <label for="id_sekolah_asal" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah_asal" value="{{ Auth::user()->sekolah_asal }}">
            </div>

            @if( $DisujianKelases->id)

            <div class="m-3">
                <label for="id_category_ujian" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                <select name="id_category_ujian" id="id_category_ujian" class="form-control">
                    <option value="{{ $DisujianKelases->categoryUjian->id }}">{{ $DisujianKelases->categoryUjian->name_category_ujian }}</option>
                </select>
            </div>

            <div class="m-3">
                <label for="id_category_pelajaran" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                <select name="id_category_pelajaran" id="id_category_pelajaran" class="form-control">
                    <option value="{{ $DisujianKelases->category->id }}">{{ $DisujianKelases->category->name_category }}</option>
                </select>
            </div>
            @endif

            @foreach ($post as $posts)
            @if($DisujianKelases->id_category == $posts->id_category )
{{--
                        <div class="m-3">
                            <p name="id_soalujian" class="card-text fs-5">{{ $posts->soal_ujian }}</p>
                        </div>


                        <div class="form-group m-3 ">

                            <label for="id_category" class="fw-bold "> Jawaban:</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban{{ $posts->id }}" id="{{ $posts->pilihan_a }}" value="A">
                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban{{ $posts->id }}" id="{{ $posts->pilihan_b }}" value="B">
                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban{{ $posts->id }}" id="{{ $posts->pilihan_c }}" value="C">
                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban{{ $posts->id }}" id="{{ $posts->pilihan_d }}" value="D">
                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                            </div>

                        </div> --}}

                        {{-- <div class="m-3">
                            <label for="id_soalujian" class="pb-2 fw-bold">{{ __('Soal Ujian') }}</label>
                            <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_soalujian" value="{{ $posts->soal_ujian }}">
                        </div>

                        <div class="form-group m-3 ">

                            <label for="id_category" class="fw-bold "> Jawaban:</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_a }}" value="A">
                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_b }}" value="B">
                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_c }}" value="C">
                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban}" id="{{ $posts->pilihan_d }}" value="D">
                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                            </div> --}}

                        {{-- </div> --}}

                        {{-- <div class="m-3">
                            <label for="id_soalujian" class="pb-2 fw-bold">{{ __('Soal Ujian') }}</label>
                            <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_soalujian" value="{{ $posts->soal_ujian }}">
                        </div> --}}

                        {{-- <div class="form-group m-3 ">

                            <label for="id_category" class="fw-bold "> Jawaban:</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_a }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_b }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_c }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_d }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                            </div>

                        </div> --}}

                        <div class="m-3">
                            <label for="id_soalujian" class="pb-2 fw-bold">{{ __('Soal Ujian') }}</label>
                            <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_soalujian" value="{{ $posts->soal_ujian }}">
                        </div>

                        <div class="form-group m-3 ">

                            <label for="id_category" class="fw-bold "> Jawaban:</label><br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_a }}" value="{{ $posts->id }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_b }}" value="{{ $posts->id }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_c }}" value="{{ $posts->id }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" for="{{ $posts->id }}" id="{{ $posts->pilihan_d }}" value="{{ $posts->id }}">
                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                            </div>

                        </div>





                        @endif
                    @endforeach
                    <hr>
                    <div class="mt-3 ml-3 float-end">
                        <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- @elseif ('/ujianSekolah-create-'.$DisujianKelases->id && $DisujianKelases->status == 1 && $DisujianKelases->id_kelas == '8' && Auth::user()->kelas->name_kelas >= '8-A' && Auth::user()->kelas->name_kelas <= '8-Z')
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

            <div class="m-3">
                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}" required>
            </div>

            <div class="m-3">
                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}" required>
            </div>

            <div class="m-3">
                <label for="id_sekolah" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah" value="{{ Auth::user()->sekolah_asal }}" required>
            </div>

            @if( $DisujianKelases->id != '/ujianSekolah-create{{ $DisujianKelases->id }}' )
            <div class="m-3">
                <label for="id_mapel" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Mapel" name="id_mapel" value="{{ $DisujianKelases->category->name_category }}" required>
            </div>

            <div class="m-3">
                <label for="id_sekolah" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah" value="{{ $DisujianKelases->categoryUjian->name_category_ujian }}" required>
            </div>
            @endif


            @foreach ($post as $posts)
            @php
                $no = 1;
            @endphp
            @if($DisujianKelases->id_category == $posts->id_category )

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

                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-3 ml-3 float-end">
                <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
            </div>
        </form>

    </div>
  </div>
</div>

@elseif ('/ujianSekolah-create-'.$DisujianKelases->id && $DisujianKelases->status == 1 && $DisujianKelases->id_kelas == '9' && Auth::user()->kelas->name_kelas >= '9-A' && Auth::user()->kelas->name_kelas <= '9-Z')
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

            <div class="m-3">
                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}" required>
            </div>

            <div class="m-3">
                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}" required>
            </div>

            <div class="m-3">
                <label for="id_sekolah" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah" value="{{ Auth::user()->sekolah_asal }}" required>
            </div>

            @if( $DisujianKelases->id != '/ujianSekolah-create{{ $DisujianKelases->id }}' )
            <div class="m-3">
                <label for="id_mapel" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Mapel" name="id_mapel" value="{{ $DisujianKelases->category->name_category }}" required>
            </div>

            <div class="m-3">
                <label for="id_sekolah" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah" value="{{ $DisujianKelases->categoryUjian->name_category_ujian }}" required>
            </div>
            @endif


            @foreach ($post as $posts)
            @php
                $no = 1;
            @endphp
            @if($DisujianKelases->id_category == $posts->id_category )

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

                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-3 ml-3 float-end">
                <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
            </div>
        </form>

    </div>
  </div>
</div> --}}

@else
<h1 class="text-center">Ujian Tidak Ada !!</h1>
<h3 class="text-center"><a href="{{ url('/home') }}" class="btn btn-primary rounded-pill fs-3">Back To Dashboard</a></h3>
@endif
@endsection

 {{-- <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jawaban" id="inlineRadio4" value="D">
              <label class="form-check-label" for="inlineRadio4">D. {{ $posts->pilihan_d }}</label>
            </div> --}}

    {{-- <!-- Default checked radio -->
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="pilihan_d" id="flexRadioDefault4" />
              <label class="form-check-label" for="flexRadioDefault4"> {{ $posts->pilihan_d }} </label>
            </div> --}}


            {{-- <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_a }}" value="{{ $posts->pilihan_a }}">
                <label class="form-check-label" for="{{ $posts->pilihan_a }}"> {{ $posts->pilihan_a }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_b }}" value="{{ $posts->pilihan_b }}">
                <label class="form-check-label" for="{{ $posts->pilihan_b }}"> {{ $posts->pilihan_b }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_c }}" value="{{ $posts->pilihan_c }}">
                <label class="form-check-label" for="{{ $posts->pilihan_c }}"> {{ $posts->pilihan_c }}</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="id_jawaban" id="{{ $posts->pilihan_d }}" value="{{ $posts->pilihan_d }}">
                <label class="form-check-label" for="{{ $posts->pilihan_d }}"> {{ $posts->pilihan_d }}</label>
            </div> --}}
