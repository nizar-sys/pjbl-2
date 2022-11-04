<x-app-layout title="Edit Rayon {{ $region->name }}">
    <div class="card">
        <div class="card-title">
            <h5>Form Edit Rayon {{ $region->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.regions.update', $region->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Rayon</label>
                    <input type="text" value="{{ old('name', $region->name) }}" name="name"
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
