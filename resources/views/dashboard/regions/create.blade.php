<x-app-layout title="Tambah Rayon">
    <div class="card">
        <div class="card-title">
            <h5>Form Tambah Rayon</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.regions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Rayon</label>
                    <input type="text" value="{{ old('name') }}" name="name"
                        class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Cisarua 2">
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
