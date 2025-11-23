@extends('layouts.app')

@section('content')
<h2>Hasil Pencarian: "{{ $query }}"</h2>

<div class="mb-3">
    @if(!empty($q))
        <h5>Hasil pencarian untuk: "{{ $q }}"</h5>
    @endif
</div>

@if(isset($rooms) && $rooms->isNotEmpty())
    <div class="row">
        @foreach($rooms as $room)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($room->description ?? '', 100) }}</p>
                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Tidak ada ruangan yang cocok.</p>
@endif

{{ $rooms->links() }}
@endsection
