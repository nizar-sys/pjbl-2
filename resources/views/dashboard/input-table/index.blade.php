 <x-app-layout title="Soal">
    <div class="card">
        <div class="card-title">
            <h5>Table Hasil</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <select class="form-select w-auto"
                    onchange="window.location.href = `?grade=${this.value}&region={{ request()->get('region') }}`">
                    <option selected disabled>Pilih Rombel</option>
                    @forelse ($grades as $grade)
                        <option {{ $grade->id == request()->get('grade') ? 'selected disabled' : '' }}
                            value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @empty
                        <option value="" disabled>Empty</option>
                    @endforelse
                </select>
                <a href="{{ route('dashboard.input-table.create') }}" onclick="event.preventDefault()"
                    data-bs-toggle="modal" data-bs-target="#modalCreate" class="btn btn-primary"><i
                        class="bi bi-plus"></i>
                    Tambah Siswa
                </a>
            </div>
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
                            <th>Nama Siswa</th>
                            <th class="text-center" colspan="2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td class="column__max text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $student->name }}</td>
                                <td class="column__max">
                                    <a href="{{ route('dashboard.input-table.edit', $student->id) }}" class="text-blue">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td class="column__max">
                                    <form action="{{ route('dashboard.input-table.destroy', $student->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="event.preventDefault();
                                this.closest('form').submit();"
                                            href="{{ route('dashboard.input-table.destroy', $student->id) }}"
                                            class="text-danger">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
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
                    <form action="{{ route('dashboard.input-table.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" value="{{ old('name') }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Rifka Tria Permana">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" value="{{ old('nis') }}" name="nis"
                                class="form-control @error('nis') is-invalid @enderror" id="nis"
                                placeholder="12008129">
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="grade_id" class="form-label">Rombel</label>
                            <select name="grade_id" class="form-select @error('grade_id') is-invalid @enderror"
                                id="grade_id">
                                @forelse ($grades as $grade)
                                    <option {{ $grade->id === old('grade_id') ? 'selected' : '' }}
                                        value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @empty
                                    <option disabled selected value="">Empty</option>
                                @endforelse
                            </select>
                            @error('grade_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="region_id" class="form-label">Rayon</label>
                            <select name="region_id" class="form-select @error('region_id') is-invalid @enderror"
                                id="region_id">
                                @forelse ($regions as $region)
                                    <option {{ $region->id === old('region_id') ? 'selected' : '' }}
                                        value="{{ $region->id }}">{{ $region->name }}</option>
                                @empty
                                    <option disabled selected value="">Empty</option>
                                @endforelse
                            </select>
                            @error('region_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{ old('username') }}" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="rifkaa">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" value="{{ old('password') }}" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="********">
                            @error('password')
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
