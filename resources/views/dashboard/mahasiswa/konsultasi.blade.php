@section('title', 'Dashboard Konsultasi')

@extends('dashboard.mahasiswa.dashboard-mahasiswa-template')

@if (isset($buatKonsultasi))
    @section('contentx')
        <div class="pagetitle">
            <h1>Konsultasi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                    <li class="breadcrumb-item active">Konsultasi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section konsultasi">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Form Konsultasi</h5>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('dashboard.mahasiswa.konsultasi.action') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Keluhan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="keluhan"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>
            </div>
        </section>
    @endsection
@else
    @section('contentx')
        <div class="pagetitle">
            <h1>Konsultasi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                    <li class="breadcrumb-item active">Konsultasi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">Konsultasi Mahasiswa</h5>
                            </div>
                            <div class="col-6">
                                <form method="POST" action="{{ route('dashboard.mahasiswa.konsultasi.action') }}">
                                    <input type="text" name="buatKonsultasi" hidden class="form-control" required value="{{ $user->id }}">
                                    {{-- <button class="btn btn-primary mb-3 mt-3 float-end shadow rounded"><i class="bi bi-plus me-1"></i>Buat Reservasi</button> --}}
                                    <button class="btn btn-primary mb-3 mt-3 float-end shadow rounded" href="{{ route('dashboard-mahasiswa-konsultasi') }}"><i class="bi bi-chat-square-text"></i> Konsultasi</button>
                                    @csrf
                                </form>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (isset($succes))
                            <div class="alert alert-success">
                                <ul>
                                    {{-- @foreach ($errors->all() as $error) --}}
                                    <li>{{ $succes }}</li>
                                    {{-- @endforeach --}}
                                </ul>
                            </div>
                        @endif

                        <style>
                            #teks-panjang {
                                max-width: 500px;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                            }
                        </style>

                        {{-- <h5 class="card-title">Reservasi Mahasiswa</h5>
                        <button type="button" class="btn btn-primary mb-3 mt-0 float-end"><i class="bi bi-plus me-1"></i> Buat Reservasi</button> --}}
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Konsultasi</th>
                                    <th scope="col">Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKonsultasi as $data)
                                    <tr>
                                        <td>{{ $data->keluhan }}</td>
                                        <td>
                                            @if (isset($data->jawaban))
                                                <button style="width: 100px" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalJawaban{{ $loop->iteration }}">
                                                    Jawaban
                                                </button>

                                                <div class="modal fade" id="ModalJawaban{{ $loop->iteration }}" tabindex="-1" aria-labelledby="ModalJawabanLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="ModalJawabanLabel">Jawaban</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $data->jawaban }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <p class="text-primary" id="teks-panjang" data-bs-toggle="modal" data-bs-target="#ModalJawaban">{{ $data->jawaban }}</p> --}}
                                            @else
                                                <button style="width: 100px" disabled type="button" class="btn btn-secondary">
                                                    <i class="bi bi-dash-lg"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->
        </section>
    @endsection
@endif
