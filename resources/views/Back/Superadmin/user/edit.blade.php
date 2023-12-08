@extends('layouts.app')

@section('title', 'Form')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                    <div class="breadcrumb-item">Form</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Forms</h2>
                <p class="section-lead">
                    Examples and usage guidelines for form control styles, layout options, and custom components for
                    creating a wide variety of forms.
                </p>
                @foreach ($users as $index => $user)
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text"
                                                class="form-control
                                            @error('name')
                                                is-invalid
                                            @enderror"
                                                placeholder="nama lengkap" name="name" value="{{ $user->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text"
                                                class="form-control
                                            @error('username')
                                            is-invalid
                                            @enderror"
                                                placeholder="masukan username" name="username"
                                                value="{{ $user->username }}">
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email"
                                                class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror"
                                                placeholder="masukan email" name="email" value="{{ $user->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password"
                                                class="form-control
                                            @error('password')
                                            is-invalid
                                            @enderror"
                                                placeholder="masukan password" name="password"
                                                value="{{ $user->password }}">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text"
                                                class="form-control
                                            @error('phone')
                                            is-invalid
                                            @enderror"
                                                placeholder="masukan nomer telepon" name="phone"
                                                value="{{ $user->phone }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>roles</label>
                                            <select
                                                class="form-control
                                    @error('roles_id')
                                        is-invalid
                                    @enderror"
                                                name="roles_id">
                                                <option value="{{ $user->roles->id }}"  selected hidden>{{ $user->roles->name }}</option>
                                                @foreach ($role as $roles)
                                                    <option value="{{ $roles->id }}"
                                                        {{ old('roles_id') == $roles->id ? 'selected' : '' }}>
                                                        {{ $roles->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('roles_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>sekolah</label>
                                            <select
                                                class="form-control
                                    @error('sekolah_id')
                                        is-invalid
                                    @enderror"
                                                name="sekolah_id">
                                                <option value="{{ $user->sekolah->id }}"  selected hidden>{{ $user->sekolah->nama_sekolahan }}</option>
                                                @foreach ($sekolah as $skh)
                                                    <option value="{{ $skh->id }}"
                                                        {{ old('sekolah_id') == $skh->id ? 'selected' : '' }}>
                                                        {{ $skh->nama_sekolahan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sekolah_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Bio</label>
                                            <textarea class="form-control resize-none" data-height="140" name="bio">{{ $user->bio }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" onclick="clearForm()" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        function clearForm() {
            // Menghapus semua nilai dari semua form field
            for (const element of document.querySelectorAll('input')) {
                element.value = '';
            }

            // Menghapus value option "Pilih salah satu"
            const options = document.querySelectorAll('select option');
            for (const option of options) {
                if (option.value === '') {
                    option.selected = true;
                }
            }
        }
    </script>
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
