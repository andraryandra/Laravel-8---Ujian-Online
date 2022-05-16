@extends('layouts.app')
@section('title' ,'Ujian Siswa')
@section('content')

@if ( $DisujianKelases->status == 1 && $DisujianKelases->id_kelas == '7' && Auth::user()->kelas->name_kelas >= '7-A' && Auth::user()->kelas->name_kelas <= '7-Z')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                @if( $DisujianKelases->id)
                <div class="card-header">Ujian Online - {{ $DisujianKelases->categoryUjian->name_category_ujian }} - {{ $DisujianKelases->category->name_category }}</div>
                @endif
                    <div class="card-body">

                        <form action="/ujianSekolah/store" method="POST">
                            @csrf

                            <div class="m-3" hidden>
                                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}">
                            </div>


                            <div class="m-3" hidden>
                                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="m-3" hidden>
                                <label for="id_sekolah_asal" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah_asal" value="{{ Auth::user()->sekolah_asal }}">
                            </div>

                            @if( $DisujianKelases->id)

                            <div class="m-3" hidden>
                                <label for="id_category_ujian" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                                <select name="id_category_ujian" id="id_category_ujian" class="form-control">
                                    <option value="{{ $DisujianKelases->categoryUjian->id }}">{{ $DisujianKelases->categoryUjian->name_category_ujian }}</option>
                                </select>
                            </div>

                            <div class="m-3" hidden>
                                <label for="id_category_pelajaran" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                                <select name="id_category_pelajaran" id="id_category_pelajaran" class="form-control">
                                    <option value="{{ $DisujianKelases->category->id }}">{{ $DisujianKelases->category->name_category }}</option>
                                </select>
                            </div>
                            @endif

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($post as $id => $posts)
                                @if($DisujianKelases->id_category == $posts->id_category )

                                <div class="card m-3 shadow-sm">
                                    <div class="card-header p-3">
                                        {{ $no++ }}. {{ $posts->soal_ujian }}
                                        <input type="hidden" name="id_soalujian[{{ $posts->id }}]" id="{{ $posts->id }}" value="{{ $posts->id }}">
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="form-group m-3 "> --}}
                                            <div class="list-group m-3">

                                            <label for="id_category" class="fw-bold mb-2"> Jawaban:</label>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_a }}" value="A" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_b }}" value="B" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_c }}" value="C" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_d }}" value="D" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                                            </label><br>
                                        </div>
                                    </div>
                                  </div>
                                @endif
                            @endforeach
                         <hr>
                        <div class="m-2 float-end">
                            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> Finish Ujian</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif ('/ujianSekolah-create-'.$DisujianKelases->id && $DisujianKelases->status == 1 && $DisujianKelases->id_kelas == '8' && Auth::user()->kelas->name_kelas >= '8-A' && Auth::user()->kelas->name_kelas <= '8-Z')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                @if( $DisujianKelases->id)
                <div class="card-header">Ujian Online - {{ $DisujianKelases->categoryUjian->name_category_ujian }} - {{ $DisujianKelases->category->name_category }}</div>
                @endif
                    <div class="card-body">

                        <form action="/ujianSekolah/store" method="POST">
                            @csrf

                            <div class="m-3" hidden>
                                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}">
                            </div>


                            <div class="m-3" hidden>
                                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="m-3" hidden>
                                <label for="id_sekolah_asal" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah_asal" value="{{ Auth::user()->sekolah_asal }}">
                            </div>

                            @if( $DisujianKelases->id)

                            <div class="m-3" hidden>
                                <label for="id_category_ujian" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                                <select name="id_category_ujian" id="id_category_ujian" class="form-control">
                                    <option value="{{ $DisujianKelases->categoryUjian->id }}">{{ $DisujianKelases->categoryUjian->name_category_ujian }}</option>
                                </select>
                            </div>

                            <div class="m-3" hidden>
                                <label for="id_category_pelajaran" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                                <select name="id_category_pelajaran" id="id_category_pelajaran" class="form-control">
                                    <option value="{{ $DisujianKelases->category->id }}">{{ $DisujianKelases->category->name_category }}</option>
                                </select>
                            </div>
                            @endif
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($post as $id => $posts)
                                @if($DisujianKelases->id_category == $posts->id_category )

                                <div class="card m-3 shadow-sm">
                                    <div class="card-header p-3">
                                        {{ $no++ }}. {{ $posts->soal_ujian }}
                                        <input type="hidden" name="id_soalujian[{{ $posts->id }}]" id="{{ $posts->id }}" value="{{ $posts->id }}">
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="form-group m-3 "> --}}
                                            <div class="list-group m-3">

                                            <label for="id_category" class="fw-bold mb-2"> Jawaban:</label>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_a }}" value="A" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_b }}" value="B" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_c }}" value="C" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_d }}" value="D" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                                            </label><br>
                                        </div>
                                    </div>
                                  </div>
                                @endif
                            @endforeach
                         <hr>
                        <div class="m-2 float-end">
                            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> Finish Ujian</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif ('/ujianSekolah-create-'.$DisujianKelases->id && $DisujianKelases->status == 1 && $DisujianKelases->id_kelas == '9' && Auth::user()->kelas->name_kelas >= '9-A' && Auth::user()->kelas->name_kelas <= '9-Z')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                @if( $DisujianKelases->id)
                <div class="card-header">Ujian Online - {{ $DisujianKelases->categoryUjian->name_category_ujian }} - {{ $DisujianKelases->category->name_category }}</div>
                @endif
                    <div class="card-body">

                        <form action="/ujianSekolah/store" method="POST">
                            @csrf

                            <div class="m-3" hidden>
                                <label for="id_kelas" class="pb-2 fw-bold">{{ __('ID Kelas') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID Kelas" name="id_kelas" value="{{ Auth::user()->kelas->id }}">
                            </div>


                            <div class="m-3" hidden>
                                <label for="id_user" class="pb-2 fw-bold">{{ __('ID User') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID User" name="id_user" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="m-3" hidden>
                                <label for="id_sekolah_asal" class="pb-2 fw-bold">{{ __('ID Sekolah') }}</label>
                                <input readonly type="text" class="form-control" placeholder="ID Sekolah" name="id_sekolah_asal" value="{{ Auth::user()->sekolah_asal }}">
                            </div>

                            @if( $DisujianKelases->id)

                            <div class="m-3" hidden>
                                <label for="id_category_ujian" class="pb-2 fw-bold">{{ __('ID Category Ujian') }}</label>
                                <select name="id_category_ujian" id="id_category_ujian" class="form-control">
                                    <option value="{{ $DisujianKelases->categoryUjian->id }}">{{ $DisujianKelases->categoryUjian->name_category_ujian }}</option>
                                </select>
                            </div>

                            <div class="m-3" hidden>
                                <label for="id_category_pelajaran" class="pb-2 fw-bold">{{ __('ID Category Pelajaran') }}</label>
                                <select name="id_category_pelajaran" id="id_category_pelajaran" class="form-control">
                                    <option value="{{ $DisujianKelases->category->id }}">{{ $DisujianKelases->category->name_category }}</option>
                                </select>
                            </div>
                            @endif

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($post as $id => $posts)
                                @if($DisujianKelases->id_category == $posts->id_category )

                                <div class="card m-3 shadow-sm">
                                    <div class="card-header p-3">
                                        {{ $no++ }}. {{ $posts->soal_ujian }}
                                        <input type="hidden" name="id_soalujian[{{ $posts->id }}]" id="{{ $posts->id }}" value="{{ $posts->id }}">
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="form-group m-3 "> --}}
                                            <div class="list-group m-3">

                                            <label for="id_category" class="fw-bold mb-2"> Jawaban:</label>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_a }}" value="A" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_a }}">A. {{ $posts->pilihan_a }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_b }}" value="B" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_b }}">B. {{ $posts->pilihan_b }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_c }}" value="C" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_c }}">C. {{ $posts->pilihan_c }}</label>
                                            </label><br>

                                            <label class="list-group-item rounded-pill">
                                                <input class="form-check-input" type="radio" name="id_jawaban[{{ $posts->id }}]" id="{{ $posts->pilihan_d }}" value="D" required>
                                                <label class="form-check-label" for="{{ $posts->pilihan_d }}">D. {{ $posts->pilihan_d }}</label>
                                            </label><br>
                                        </div>
                                    </div>
                                  </div>
                                @endif
                            @endforeach
                         <hr>
                        <div class="m-2 float-end">
                            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> Finish Ujian</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<h1 class="text-center">Ujian Tidak Ada !!</h1>
<h3 class="text-center"><a href="{{ url('/home') }}" class="btn btn-primary rounded-pill fs-3">Back To Dashboard</a></h3>
@endif

@endsection
