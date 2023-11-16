@extends('layout.layout')

@section('title', 'detail')

@section('main')

<main class="d-flex justify-content-center align-items-center h-75">
    @include('layout.errorlayout')
    <div class="mb-3">
        <p>글번호 : </p>
        <p>{{$data->b_id}}</p>
    </div>
    <div class="mb-3">       
        <p>제목  : </p>
        <p>{{$data->b_title}}</p>
    </div>
    <div class="mb-3">
        <p>내용 : </p>
        <p>{{$data->b_content}}</p>
    </div>
    <div class="mb-3">
        <p>조회수 : </p>
        <p>{{$data->b_hits}}</p>
    </div>
    <div class="mb-3">
        <p>작성일 : </p>
        <p>{{$data->created_at}}</p>
    </div>
    <div class="mb-3">
        <p>수정일 : </p>
        <p>{{$data->updated_at}}</p>
    </div>
    <div>
        <div class="card-footer">
            <form action="{{route('board.destroy', ['board'=> $data->b_id])}}" method="POST" >
                {{-- 폼태그로 보내주기 때문에 사용 --}}
                @csrf
                {{-- 블레이드 문법 --}}
                @method('delete') 
                <button type="submit" class="btn btn-danger">삭제</button>
                <a href="{{route('board.index')}}" class="btn btn-dark">취소</a>
            </form>
        </div>
    </div>
</main>
@endsection