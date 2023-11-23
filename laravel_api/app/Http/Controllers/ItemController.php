<?php

// 컨트롤러 생성 php artisan make:controller ItemController 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Item;


class ItemController extends Controller
{
    // 게시글 조회
    public function index() {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];
        
        $result = Item::orderBy('created_at', 'desc')->get();

        if($result->count() < 1) {
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            $responseData['data'] = $result;
        }

        return $responseData;
    }

    // 게시글 작성
    public function store(Request $request) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];
        
        $result = Item::create($request->data);

        $responseData['data'] = $result;

        return $responseData;
    }

    // 게시글 수정
    public function update(Request $request, $id) { // id도 담아서 세그먼트 파라미터 사용할 수 있음
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::find($id);

        if(!$result) {
            // 예외 처리 : 데이터 0건일 경우
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            $responseData['data'] = $result;
        }
        return $responseData;
    }

    // 게시글 삭제
    public function destroy($id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
        ];

        $result = Item::find($id);

        if(!$result) {
            // 예외 처리 : 데이터 0건일 경우
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->delete();
        }
        return $responseData;
    }
} 