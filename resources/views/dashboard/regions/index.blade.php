<x-app-layout title="Rayon">
    <div class="card">
        <div class="card-title">
            <h5>Table Rayon</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('dashboard.regions.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                Tambah Rayon
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
                            <th>Rayon</th>
                            <th class="text-center" colspan="2">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($regions as $region)
                            <tr>
                                <td class="column__max text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $region->name }}</td>
                                <td class="column__max">
                                    <a href="{{ route('dashboard.regions.edit', $region->id) }}" class="text-blue">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td class="column__max">
                                    <form action="{{ route('dashboard.regions.destroy', $region->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                            href="{{ route('dashboard.regions.destroy', $region->id) }}"
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
