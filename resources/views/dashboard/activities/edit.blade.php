<x-app-layout title="Edit Soal {{ $activity->name }}">
    <div class="card">
        <div class="card-title">
            <h5>Form Edit Soal {{ $activity->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.activities.update', $activity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Soal</label>
                            <input type="text" value="{{ old('name', $activity->name) }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Pencahayaan ruang kerja cukup.">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Paket Soal</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id">
                                @forelse ($categories as $category)
                                    <option
                                        {{ $category->id === old('category_id', $activity->category->id) ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option disabled selected value="">Empty</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
