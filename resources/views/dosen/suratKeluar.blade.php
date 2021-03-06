@extends('dosen.main')

<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/dosen/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/dosen/surat-masuk">
            <i class="metismenu-icon bx bxs-envelope"></i>
            Surat Masuk
        </a>
    @endsection

    @section('suratKeluar')
        <a href="/dosen/surat-keluar" class="mm-active">
            <i class="metismenu-icon bx bxs-paper-plane"></i>
            Surat Keluar
        </a>
    @endsection

    @section('pengajuanSurat')
        <a href="#">
            <i class="metismenu-icon bx bxs-message-square-add"></i>
            Pengajuan Surat
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            <li>
                <a href="/dosen/pengajuan-surat/surat-tugas">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/dosen/pengajuan-surat/surat-keterangan">
                    <i class="metismenu-icon"></i>
                    Surat Keterangan
                </a>
            </li>
            <li>
                <a href="/dosen/pengajuan-surat/berita-acara">
                    <i class="metismenu-icon"></i>
                    Berita Acara
                </a>
            </li>
        </ul>
    @endsection

    @section('arsipSurat')
        <a href="/dosen/arsip-surat">
            <i class="metismenu-icon bx bxs-bookmarks"></i>
            Arsip Surat
        </a>
    @endsection

<!-- End Menu SideBar -->


@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Surat Keluar</h5>
                    <div class="table-responsive">
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tgl.Pelaksanaan</th>
                                    <th>Jenis Surat</th>
                                    <th>Prihal</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach ($surat as $data )

                                @if($data->user->id === Auth::user()->id)
                                    <tr>
                                        <th scope="row">{{ $no++}}</th>
                                        <td>{{ $data->tgl_pelaksanaan }}</td>
                                        <td>{{ $data->nama_jenis_surat}}</td>
                                        <td>{{ $data->prihal }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>
                                            <div class="mb-1">
                                                <button type="button" class="btn badge badge-secondary border-0" data-toggle="modal" data-target="#lihatSurat">
                                                    <i class='bx bxs-show bx-xs'></i>
                                                </button>
                                            </div>

                                                <!-- Button Edit -->
                                                    @if ($data->id_jenis_surats == 'A' && $data->tipe_surat == 'keluar')
                                                        <div class="">
                                                            <a href="surat/edit-surat/id-{{ $data->id }}" class="badge badge-info">
                                                                <i class='bx bxs-edit bx-xs' title="Surat Personalia"></i>
                                                            </a>
                                                        </div>
                                                    @elseif($data->id_jenis_surats == 'B' && $data->tipe_surat == 'keluar')
                                                        <div class="">
                                                            <a href="surat-keluar/edit-surat-kegiatan/id-{{ $data->id }}" class="badge badge-info">
                                                                <i class='bx bxs-edit bx-xs' title="Surat Kegiatan Mahasiswa"></i>
                                                            </a>
                                                        </div>
                                                    @elseif($data->id_jenis_surats == 'C' && $data->tipe_surat == 'keluar')
                                                        <div class="">
                                                            <a href="surat/edit-surat-undangan/id-{{ $data->id }}" class="badge badge-info">
                                                                <i class='bx bxs-edit bx-xs' title="Surat Undangan"></i>
                                                            </a>
                                                        </div>
                                                    @elseif($data->id_jenis_surats == 'D' && $data->tipe_surat == 'keluar')
                                                        <div class="">
                                                            <a href="surat-keluar/edit-surat-tugas/id-{{ $data->id }}" class="badge badge-info">
                                                                <i class='bx bxs-edit bx-xs' title="Surat Tugas"></i>
                                                            </a>
                                                        </div>
                                                    @elseif($data->id_jenis_surats == 'E' && $data->tipe_surat == 'keluar')
                                                        <div class="">
                                                            <a href="surat-keluar/edit-berita-acara/id-{{ $data->id }}" class="badge badge-info">
                                                                <i class='bx bxs-edit bx-xs' title="Berita Acara"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                <!-- End Button Edit -->

                                            <div class="mt-1">
                                                <button type="button" class="btn badge badge-danger border-0" data-toggle="modal" data-target="#exampleModal">
                                                    <i class='bx bxs-trash bx-xs'></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Info Hapus Surat Keluar -->
    @foreach ($surat as $data )
    @if($data->user->id === Auth::user()->id)
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Surat</h5>
                    </div>
                    <div class="modal-bodys">
                        <p class="mb-2 ml-2">
                            Jenis Surat : {{ $data->nama_jenis_surat }}
                            <br/>Prihal : {{ $data->prihal }}
                            <br/>Apakah anda yakin akan menghapus surat?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="surat-keluar/hapus-surat/id-{{ $data->id }}" class="btn btn-primary">YA</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
<!-- End Info Hapus Surat Keluar -->


<!-- Info Lihat Surat Keluar -->
    @foreach ($surat as $data )
    @if($data->user->id === Auth::user()->id)
        <div class="modal fade" id="lihatSurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
                    </div>
                    <div class="modal-bodys">
                        <p class="mb-2 ml-2">
                            Jenis Surat  : {{ $data->nama_jenis_surat }}
                            <br/>Prihal  : {{ $data->prihal }}
                            <br/>Jam     : {{ $data->waktu_pelaksanaan }}
                            <br/>Tanggal : {{ $data->tgl_pelaksanaan }}
                            <br/>Keterangan : {{ $data->keterangan }}
                            </p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
<!-- End Info Lihat Surat Keluar -->
