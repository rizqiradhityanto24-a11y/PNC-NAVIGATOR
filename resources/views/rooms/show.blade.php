@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h3 class="mb-4">
        Hasil Pencarian: 
        <span class="text-primary">"{{ $keyword }}"</span>
    </h3>

    {{-- jika tidak ada hasil --}}
    @if($rooms->isEmpty())
        <div class="alert alert-warning">
            Tidak ada ruangan yang cocok dengan pencarian kamu.
        </div>
    @else

        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>

                            <p class="card-text mb-1">
                                <strong>Kode:</strong> {{ $room->code }}
                            </p>

                            <p class="card-text mb-2">
                                <strong>Gedung:</strong> {{ $room->building }}
                            </p>

                            <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-primary w-100">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endif

</div>
@endsection
