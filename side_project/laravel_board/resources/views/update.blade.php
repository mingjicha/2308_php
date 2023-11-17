@extends('layout.layout')

@section('title', 'update')

@section('main')
<main>
  {{-- 폼태그에서 method는 POST랑 GET만 --}}
  <form action="{{route('board.update',['board'=> $data->b_id])}}" method="POST" enctype="multipart/form-data"> 
    @include('layout.errorlayout')
    @csrf
    {{-- 말고 다른 method는 @method --}}
    @method('PUT')
      <div class="card">
        <div class="card-header">
          <label for="title" class="form-label">제목</label>
          <input type="text" class="form-control" name="b_title" class="form-control" value="{{$data->b_title}}">
        </div>
        <div class="card-body">
          <label for="content" class="form-label">내용</label>
          <textarea class="form-control" name="b_content" rows="5">{{$data->b_content}}</textarea>
        </div>
        <div class="card-footer">
          <a href="{{route('board.index')}}" class="btn btn-outline-dark">취소</a>
          <button type="submit" class="btn btn-outline-primary">수정</button>
        </div>
      </div>
  </form>
</main>
@endsection