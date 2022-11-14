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
                            <th class="date-locale">{{ \Carbon\Carbon::parse($job->date)->timezone('Asia/Jakarta')->format('l, F Y') }}</th>
                            <th>{{ $job->start_jp }}</th>
                            <th>{{ $job->end_jp }}</th>
                            @php
                                $actual_start_at = \Carbon\Carbon::parse($job->start_jp);
                                $actual_end_at = \Carbon\Carbon::parse($job->end_jp);
                                $mins = $actual_end_at->diff($actual_start_at, true);
                            @endphp
                            <th>{{ $job->duration }}
                                <small>({{ $mins->h . ' Jam ' . $mins->i . ' menit ' }})</small>
                            </th>
                           </tr>  
                        <tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endsection
</x-app-layout>
