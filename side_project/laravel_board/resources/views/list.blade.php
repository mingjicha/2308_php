@extends('layout.layout')

@section('title', 'List')

@section('main')

<div class="text-center mt-5 mb-5">
    <a href="{{route('board.create')}}" class="btn btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
    </a>
</div>
<main>
    @forelse($data as $item)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $item->b_title }}</h5>
                <p class="card-text">{{ $item->b_content }}</p>
                <a href="{{route('board.show', ['board'=> $item->b_id]) }}" class="btn btn-outline-dark">상세</a>
            </div>
        </div>
    @empty
        <div>게시글없음</div>
    @endforelse
</main>
@endsection