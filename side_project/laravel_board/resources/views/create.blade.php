@extends('layout.layout')

@section('title', 'create')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form action="{{route('board.store')}}" method="POST" enctype="multipart/form-data" style="width: 300px;">
        @include('layout.errorlayout')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">제목</label>
          <input type="text" class="form-control" name="b_title" class="form-control">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">내용</label>
          <input type="text" class="form-control" name="b_content" class="form-control">
        </div>
        <a href="{{route('board.index')}}" class="btn btn-secondary">취소</a>
        <button type="submit" class="btn btn-dark float-end">작성</button>
    </form>
</main>
@endsection