@extends('admin.main')


<!-- Menu SideBar -->
    @section('dashboard')
        <a href="/admin/dashboard">
            <i class="metismenu-icon bx bxs-dashboard"></i>
            Dashboard
        </a>
    @endsection

    @section('suratMasuk')
        <a href="/admin/surat" class="">
            <i class="metismenu-icon bx bxs-envelope"></i>
            Data Surat
        </a>
    @endsection

    @section('buatSurat')
        <a href="#">
            <i class="metismenu-icon bx bxs-message-square-add"></i>
            Buat Surat
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul class="mm-show">
            <li>
                <a href="/admin/buat-surat/surat-tugas" class="">
                    <i class="metismenu-icon"></i>
                    Surat Tugas
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-keterangan" class="mm-active">
                    <i class="metismenu-icon"></i>
                    Surat keterangan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-sk-dekan">
                    <i class="metismenu-icon"></i>
                    Surat SK Dekan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/surat-undangan">
                    <i class="metismenu-icon"></i>
                    Surat Undangan
                </a>
            </li>
            <li>
                <a href="/admin/buat-surat/berita-acara">
                    <i class="metismenu-icon"></i>
                    Berita Acara
                </a>
            </li>
        </ul>
    @endsection

    @section('pejabat')
        <a href="/admin/pejabat">
            <i class='metismenu-icon bx bxs-user-plus'></i>
            Pejabat
        </a>
    @endsection

    @section('arsipSurat')
        <a href="/admin/arsip-surat">
            <i class="metismenu-icon bx bxs-bookmarks"></i>
            Arsip Surat
        </a>
    @endsection

<!-- End Menu SideBar -->

@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Form Surat Keterangan</h5>
            <form class="" action="{{ route('admin-simpan-surat-keterangan') }}" method="POST">
                @csrf
                <!--Hidden Inputan -->
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_jenis_surats" value="B">
                    <input type="hidden" name="nama_jenis_surat" value="Surat Keterangan">
                    <input type="hidden" name="tipe_surat" value="keluar">
                    <input type="hidden" name="status" value="diproses">
                <!--End Hidden Inputan -->

                <div class="position-relative form-group">
                    <label for="prihal" class="">Prihal</label>
                    <input name="prihal" id="prihal" placeholder="Prihal Surat" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="tema" class="">Tema </label>
                    <input name="tema" id="isi_surat" placeholder="Tema Surat" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="nama_mitra" class="">Mitra</label>
                    <input name="nama_mitra" id="nama_mitra" placeholder="Nama Mitra" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="lokasi" class="">Tempat</label>
                    <input name="lokasi" id="lokasi" placeholder="Tempat" type="text" class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="waktu_mulai" class="">Jam Mulai</label>
                            <input name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="waktu_selesai" class="">Jam Selesai</label>
                            <input name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="tgl_pelaksanaan" class="">Tanggal</label>
                            <input name="tgl_pelaksanaan" id="tgl_pelaksanaan" placeholder="Tgl Pelaksanan" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="isi_surat" class="">Isi Surat</label>
                    <textarea name="isi_surat" id="isi_surat" class="form-control"></textarea>
                </div>
                <button class="mt-2 btn btn-primary">Buat</button>
                <a href="/admin/surat" class="mt-2 btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
