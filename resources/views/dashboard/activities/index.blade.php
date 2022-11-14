<x-app-layout title="Soal">
    <div class="card">
        <div class="card-title">
            <h5>Table Soal</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('dashboard.activities.create') }}" onclick="event.preventDefault()" data-bs-toggle="modal"
                data-bs-target="#modalCreate" class="btn btn-primary"><i class="bi bi-plus"></i>
                Tambah Soal
            </a>
            @if (session()->has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th class="text-center" colspan="2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th colspan="9999">{{ $category->name }}</th>
                            </tr>
                            @php $no = 1 @endphp
                            @forelse ($activities as $activity)
                                @if ($activity->category->id === $category->id)
                                    <tr>
                                        <td class="column__max text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td>{{ $activity->name }}</td>
                                        <td class="column__max">
                                            <a href="{{ route('dashboard.activities.edit', $activity->id) }}"
                                                class="text-blue">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td class="column__max">
                                            <form action="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                                    href="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                    class="text-danger">
                                                    <i class="bi bi-trash3"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">
                                        Empty
                                    </td>
                                </tr>
                            @endforelse
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">
                                    Empty
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCreateLabel">Tambah Soal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.activities.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Paket Soal</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id">
                                @forelse ($categories as $category)
                                    <option {{ $category->id === old('category_id') ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option disabled selected value="">Empty</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Soal</label>
                            <input type="text" value="{{ old('name') }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Pencahayaan ruang kerja cukup.">
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
        </div>
    </div>
</x-app-layout>
