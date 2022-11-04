<x-app-layout title="Edit Siswa {{ $input_form->name }}">
    <div class="card">
        <div class="card-title">
            <h5>Form Edit Siswa {{ $input_form->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.input-form.update', $input_form->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" value="{{ old('name', $input_form->name) }}" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Rifka Tria Permana">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" value="{{ old('nis', $input_form->nis) }}" name="nis"
                                class="form-control @error('nis') is-invalid @enderror" id="nis"
                                placeholder="12008129">
                            @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="grade_id" class="form-label">Rombel</label>
                            <select name="grade_id" class="form-select @error('grade_id') is-invalid @enderror"
                                id="grade_id">
                                @forelse ($grades as $grade)
                                    <option
                                        {{ $grade->id === old('grade_id', $input_form->grade_id) ? 'selected' : '' }}
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
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="region_id" class="form-label">Rayon</label>
                            <select name="region_id" class="form-select @error('region_id') is-invalid @enderror"
                                id="region_id">
                                @forelse ($regions as $region)
                                    <option
                                        {{ $region->id === old('region_id', $input_form->region->id) ? 'selected' : '' }}
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
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{ old('username', $input_form->user->username) }}"
                                name="username" class="form-control @error('username') is-invalid @enderror"
                                id="username" placeholder="rifkaa">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" value="{{ old('password') }}" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="********">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
