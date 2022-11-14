<x-app-layout title="Paket Soal">
    <div class="card">
        <div class="card-title">
            <h5>Table Paket Soal</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                Tambah Paket Soal
            </a>
            @if (session()->has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Paket Soal</th>
                            <th class="text-center" colspan="2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td class="column__max text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $category->name }}</td>
                                <td class="column__max">
                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="text-blue">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td class="column__max">
                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                            href="{{ route('dashboard.categories.destroy', $category->id) }}"
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
</x-app-layout>
