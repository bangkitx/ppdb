@extends('layouts.main')

@section('container')
    <h3 class="mb-3">Masukkan nilai {{ $agen->nama_lengkap }}</h3>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mb-5">
        <form action="{{ url('agen/nilai/update/' . $agen->user_id) }}" method="post">
            @csrf
            @method('PUT')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Tes</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nilaiAgen = $agen->nilai ?? new \App\Models\Nilai();
                    @endphp
                    <tr>
                        <td>Observasi Akademik </td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="akademik"
                                    class="form-select form-control @error('akademik') is-invalid @enderror" name="akademik"
                                    required @if ($config->pengumuman == 1) disabled @endif>
                                    <option value="" disabled {{ $nilaiAgen->akademik == '' ? 'selected' : '' }}>Pilih
                                        nilai A-E</option>
                                    @foreach (['A', 'B', 'C', 'D', 'E'] as $nilai)
                                        <option value="{{ $nilai }}"
                                            {{ $nilaiAgen->akademik == $nilai ? 'selected' : '' }}>{{ $nilai }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('akademik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="test_membaca_al_quran"
                                    class="form-select form-control @error('test_membaca_al_quran') is-invalid @enderror"
                                    name="test_membaca_al_quran" required @if ($config->pengumuman == 1) disabled @endif>
                                    <option value="" disabled
                                        {{ $nilaiAgen->test_membaca_al_quran == '' ? 'selected' : '' }}>Pilih nilai A-E
                                    </option>
                                    @foreach (['A', 'B', 'C', 'D', 'E'] as $nilai)
                                        <option value="{{ $nilai }}"
                                            {{ $nilaiAgen->test_membaca_al_quran == $nilai ? 'selected' : '' }}>
                                            {{ $nilai }}</option>
                                    @endforeach
                                </select>
                                @error('test_membaca_al_quran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Kelulusan</td>
                        <td>
                            <form name="status" class="form-select form-control" required disabled>
                                <option selected disabled value="{{ $nilaiAgen->status }}">
                                    {{ $nilaiAgen->status ?? 'Status belum ditentukan' }}</option>
                                </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success btn-block" type="submit"
                @if ($config->pengumuman == 1) disabled @endif>Submit nilai</button>
        </form>
    </div>

    <a href="/agen" class="btn btn-warning btn-block">Kembali</a>
@endsection
