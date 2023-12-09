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
                @foreach ($mapels as $index => $mapel )
                <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama mata pelajaran</label>
                                            <input type="text"
                                                class="form-control
                                            @error('nama_mapel')
                                                is-invalid
                                            @enderror"
                                                placeholder="nama mata pelajaran" name="nama_mapel"
                                                value="{{ $mapel->nama_mapel }}">
                                            @error('nama_mapel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Tingkat sekolah</label>
                                            <select
                                                class="form-control
                                                    @error('tingkat_sekolah_id')
                                                        is-invalid
                                                    @enderror"
                                                name="tingkat_sekolah_id">
                                                <option value="{{ $mapel->tingkat_sekolah->id }}"  selected hidden>{{ $mapel->tingkat_sekolah->nama }}</option>
                                                @foreach ($tingkats as $tingkat)
                                                    <option value="{{ $tingkat->id }}"
                                                        {{ old('tingkat_sekolah_id') == $tingkat->id ? 'selected' : '' }}>
                                                        {{ $tingkat->nama }}
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
                                                <option value="1" {{ $mapel->is_active ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ !$mapel->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('keterangan')
                                            is-invalid
                                            @enderror">
                                            <label>Keterangan</label>
                                            <textarea class="form-control resize-none" data-height="140" name="keterangan">{{ $mapel->keterangan }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
