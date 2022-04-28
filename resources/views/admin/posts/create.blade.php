@extends('layouts.app')
@section('posts')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Posts</h4>
                </div>
                <div class="m-3">
                    <a href="/posts" class="btn btn-secondary">Kembali</a>
                    </div>
                <form action="/posts/store" method="post">
                    @csrf

                    <div class="form-group m-3">
                        <label for="id_category" class="pb-2 fw-bold">ID_Category</label>
                        <select class="form-control" name="id_category" id="id_category">
                            @foreach($categori as $id => $categories)
                                <option value="{{ $id}}">{{ $categories}}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="m-3">
                    <label for="soal_ujian" class="pb-2 fw-bold">Create Soal Ujian</label>
                    <textarea name="soal_ujian" id="soal_ujian" cols="30" rows="10" class="form-control">{{ old('soal_ujian') }}</textarea>
                </div>
                <div class="m-3">
                    <label for="pilihan_a" class="pb-2 fw-bold">{{ __('Pilihan A') }}</label>
                    <input type="text" class="form-control" placeholder="pilihan_a" name="pilihan_a" value="{{ old('pilihan_a') }}" required>
                </div>    
                <div class="m-3">
                    <label for="pilihan_b" class="pb-2 fw-bold">{{ __('Pilihan B') }}</label>
                    <input type="text" class="form-control" placeholder="pilihan_b" name="pilihan_b" value="{{ old('pilihan_b') }}" required>
                </div>
                <div class="m-3">
                    <label for="pilihan_c" class="pb-2 fw-bold">{{ __('Pilihan C') }}</label>
                    <input type="text" class="form-control" placeholder="pilihan_c" name="pilihan_c" value="{{ old('pilihan_C') }}" required>
                </div> 
                <div class="m-3">
                    <label for="pilihan_d" class="pb-2 fw-bold">{{ __('Pilihan D') }}</label>
                    <input type="text" class="form-control" placeholder="pilihan_d" name="pilihan_d" value="{{ old('pilihan_d') }}" required>
                </div> 
                <div class="m-3">
                    <label for="jawaban" class="mb-2 btn btn-success">{{ __('Jawaban Benar') }}</label>
                    <input type="text" class="form-control" placeholder="jawaban" name="jawaban" value="{{ old('jawaban') }}" required>
                </div> 

                <div class="m-3">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-warning">RESET</button>
                </div>

            </form>
            </div>
        </div>
    </div>
@endsection