@extends('layouts.template')
@section('content')
    <section class="content">
        <div class="container-fluid p-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3"><strong>Feedback</strong></h1>
                <a href="{{ route('feedback.create') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> + Tambah Data Baru</a>
            </div>
            <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Data Feedback</h4>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('Berhasil'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Saran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedback as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_depan . ' ' . $item->nama_belakang }}</td>
                                                <td>{{ $item->saran }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{ route('feedback.destroy', $item->id_feedback) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-danger" title="Hapus"
                                                                data-toggle="tooltip"
                                                                onclick="confirm('{{ __('Apakah anda yakin ingin menghapus ?') }}')? this.parentElement.submit() : ''">
                                                                <i class="align-middle" data-feather="trash-2"></i>
                                                                <span class="align-middle"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
