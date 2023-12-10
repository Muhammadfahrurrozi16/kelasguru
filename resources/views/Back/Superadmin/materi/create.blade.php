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
                <form action="{{ route('materi.store') }}" method="POST">
                    @csrf
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Materi</label>
                                            <input type="text"
                                                class="form-control
                                            @error('name')
                                                is-invalid
                                            @enderror"
                                                placeholder="masukan Judul Materi " name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Mata pelajaran</label>
                                            <select
                                                class="form-control
                                                    @error('mapel_id')
                                                        is-invalid
                                                    @enderror"
                                                name="mapel_id">
                                                <option value="" disabled selected hidden>Pilih salah satu</option>
                                                @foreach ($mapels as $mapel)
                                                    <option value="{{ $mapel->id }}"
                                                        {{ old('mapel_id') == $mapel->id ? 'selected' : '' }}>
                                                        {{ $mapel->nama_mapel }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tingkat_sekolah_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select
                                                class="form-control
                                                    @error('is_active')
                                                        is-invalid
                                                    @enderror"
                                                name="is_active">
                                                <option value="" disabled selected hidden>Pilih salah satu</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sinopsis Materi</label>
                                            <textarea class="form-control resize-none @error('sinopsis')
                                            is-invalid
                                            @enderror" data-height="140" name="sinopsis" >{{ old('sinopsis') }}</textarea>
                                            @error('sinopsis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Materi</label>
                                    <textarea name="materi" data-height="140"
                                        class="form-control summernote-simple
                                    @error('materi')
                                        is-invalid
                                    @enderror">{{ old('materi') }}</textarea>
                                    @error('materi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" onclick="clearForm()" type="reset">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>

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
