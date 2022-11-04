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
                            <th><center>Tanggal Pengerjaan<center></th>
                            <th><center>Mulai Pengerjaan<center></th>
                            <th><center>Akhir Pengerjaan<center></th>
                            <th><center>Durasi<center></th>
                        </tr>
                        @foreach($jobs as $job)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $job->date }}</th>
                            <th>{{ $job->start_jp }}</th>
                            <th>{{ $job->end_date }}</th>
                            <th>{{ $job->duration }}</th>
                           </tr>  
                        <tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
