<x-app-layout title="Hasil">
    <div class="card">
        <div class="card-title">
            <h5>Form Hasil</h5>
        </div>
        <div class="card-body">
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
                            <th><center>No</center></th>
                            <th><center>Pembiasaan<center></th>
                            <th><center>Day 1<center></th>
                            <th><center>Day 2<center></th>
                            <th><center>Day 3<center></th>
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
                                        <center><input type="checkbox"></center>  
                                            <form action="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                                    href="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                    class="text-danger">
                                                </a>
                                            </form>
                                        </td>
                                        <td><center><input type="checkbox"></center></td>
                                        <td><center><input type="checkbox"></center></td>
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
</x-app-layout>
