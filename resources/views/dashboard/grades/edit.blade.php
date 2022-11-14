<x-app-layout title="Edit Rombel {{ $grade->name }}">
    <div class="card">
        <div class="card-title">
            <h5>Form Edit Rombel {{ $grade->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.grades.update', $grade->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Rombel</label>
                    <input type="text" value="{{ old('name', $grade->name) }}" name="name"
                        class="form-control @error('name') is-invalid @enderror" id="name" placeholder="RPL XII-2">
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
