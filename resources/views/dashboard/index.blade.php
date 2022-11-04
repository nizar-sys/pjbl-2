<x-app-layout title="Dashboard">

    @if (auth()->user()->is_teacher)
    <h1>Selamat datang </h1>             

    @else
    <div class="card">
        <div class="card-title">
        <div class="col-md-8">  
            <h5>Form Input</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tangal Pengerjaan</label>
                    <input type="date" value="{{ old('name') }}" name="date"
                        class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Mulai Pengerjaan</label>
                    <input type="time" value="{{ old('name') }}" name="start_jp"
                        class="form-control @error('name') is-invalid @enderror" id="name">
                        <label for="name" class="form-label">Akhir Pengerjaan</label>
                    <input type="time" value="{{ old('name') }}" name="end_jp"
                    class="form-control @error('name') is-invalid @enderror" id="name">    
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Durasi Pengerjaan</label>
                    <input type="time" value="{{ old('name') }}" name="duration"
                        class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Desc</label>
                    <textarea name="content" class="my-editor form-control" id="my-editor" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    @endif
  
@push('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor');
    </script>
@endpush
@stack('scripts')
</x-app-layout>
