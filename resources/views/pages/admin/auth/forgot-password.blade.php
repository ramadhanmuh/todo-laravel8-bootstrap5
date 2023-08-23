@extends('layouts.auth')

@section('title', 'Admin - Lupa Kata Sandi')

@section('description', 'Halaman yang menampilkan formulir atur ulang kata sandi untuk administrator.')

@section('content')
    <div class="col-11 col-md-6 col-lg-5 col-xl-4 shadow border p-3 bg-white">
        <h1 class="text-center m-0">Lupa Kata Sandi</h1>
        <h5 class="m-0 text-center mb-3">(Administrator)</h5>
        <div class="alert alert-danger d-none" id="validationErrorMessageColumn">
            <ul class="m-0" id="validationErrorMessageList">
            </ul>
        </div>
        <div class="d-none alert alert-success" id="successAlertForm"></div>
        <p>Silahkan isi formulir ini untuk dikirimkan tautan halaman perubahan kata sandi melalui email.</p>
        <form class="row" method="POST" action="{{ route('admin.forgot-password.send') }}" id="forgotPasswordForm">
            <div class="col-12 mb-3">
                <label for="email" class="form-label">
                    Email
                </label>
                <input type="email" class="form-control" id="email" name="email" maxlength="255" required>
            </div>
            <div class="col-12">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit" disabled id="submitButton">
                            Kirim Tautan
                        </button>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.login.show') }}" class="text-decoration-none" id="toLoginPageButton">
                            Halaman Login
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script defer src="{{ url('assets/js/admin/forgot-password.js') }}"></script>
@endpush