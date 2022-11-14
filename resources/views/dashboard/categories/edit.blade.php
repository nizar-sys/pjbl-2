<x-app-layout title="Edit Paket Soal {{ $category->name }}">
    <div class="card">
        <div class="card-title">
            <h5>Form Edit Paket Soal {{ $category->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paket Soal</label>
                    <input type="text" value="{{ old('name', $category->name) }}" name="name"
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
