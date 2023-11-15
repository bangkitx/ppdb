@extends('layouts.main')

@section('container')
    <script>
        function fixAspect(img) {
            var $img = $(img),
                width = $img.width(),
                height = $img.height(),
                tallAndNarrow = width / height < 1;
            if (tallAndNarrow) {
                $img.addClass('tallAndNarrow');
            }
            $img.addClass('loaded');
        }
    </script>
    <style>
        .input-group-text {
            width: 8rem !important;
        }
    </style>
    <div class="card  mb-5">
        <div class="card ">
            <div class="card-header">
                <h2>Profil</h2>
            </div>

            @if (session('flash_message'))
                <div class="alert alert-success">
                    {{ session('flash_message') }}
                </div>
            @endif
            @if (session('flash_message_error'))
                <div class="alert alert-danger">
                    {{ session('flash_message_error') }}
                </div>
            @endif
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <div class="rounded-circle" style="width: 150px; height: 150px; overflow: hidden;">
                            <img class="img-fluid" src="{{ asset(Auth::user()->avatar) }}"
                                style="object-fit: cover; width: 100%; height: 100%;" alt="User Avatar">
                        </div>
                    </div>
                </div>

            <div class="cold-mb-5">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $agen->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $agen->email }}</td>
                                </tr>
                                <tr>
                                    <td>Kata Sandi</td>
                                    <td>*******</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <a href="{{ url('/profile/' . $agen->id . '/edit') }}" class="btn btn-success btn-block">Sunting Profil
            </a>

        </div>
    </div>
@endsection
