<x-app-layout title="Tambah Paket Soal">
    <div class="card">
        <div class="card-title">
            <h5>Form Tambah Paket Soal</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paket Soal</label>
                    <input type="text" value="{{ old('name') }}" name="name"
                        class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Kesehatan">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
