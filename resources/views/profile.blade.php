@extends('layouts.template')
@section('content')
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Update Profile</h1>
                            <p class="lead">

                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="{{ route('profile.update', $users->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control form-control-lg" id="name" type="text" name="name"
                                                placeholder="Harap Masukkan Name Anda" value="{{ $users->name }}"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" id="email" type="email" name="email"
                                                placeholder="Harap Masukkan Email Anda" value="{{ $users->email }}"
                                                required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" id="password" type="password"
                                                name="password" placeholder="Harap Masukkan Password Anda" />
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" value="simpan"
                                                class="btn btn-lg btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
