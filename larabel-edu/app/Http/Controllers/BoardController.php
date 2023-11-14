<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {
        // -----------
        // 쿼리빌더
        // -----------
        // $result = DB::select('select * from boards limit 10');
        
        // $result = DB::select('select * from boards limit :no', ['no' => 1]);
        // $result = DB::select('select * from boards limit ?', [1]);
        
        // ------------------------------------SELECT 

        // [참고]
        // =SELECT [DISTINCT] [컬럼명]
        // FROM [테이블명]
        // WHERE [쿼리조건]
        // FROM [테이블명]
        // 	JOIN [테이블명] ON [조인조건]
        // GROUP BY [컬럼명] HAVING [집계함수 조건]
        // ORDER BY [컬럼명ASC || 컬럼명 DESC]
        // LIMIT 출력수 [OFFSET 시작번호]
        // ;

        // 1. 카테고리가 4, 7, 8 인 게시글의 수를 출력해 주세요.
        // SELECT COUNT(id)
        // FROM boards
        // WHERE categories_no = 4 OR categories_no = 7 or categories_no = 8;
        $arr = [4, 7, 8];
        // $result = DB::select('select Count(id) from boards where categories_no in(?, ?, ?)', $arr);
        $result = DB::select(
            'SELECT Count(id) 
            FROM boards 
            WHERE categories_no = ?
            OR categories_no = ? 
            OR categories_no = ?'
            , $arr);
            // , [4, 7, 8]);

        // 2. 카테고리별 게시글 개수를 출력해 주세요.
        // SELECT categories_no AS 카테고리명, COUNT(categories_no) AS 개수
        // FROM boards
        // GROUP BY categories_no;
        $result = DB::select(
            'SELECT categories_no name
            ,COUNT(categories_no) cnt 
            FROM boards 
            GROUP BY categories_no'
            );

        // 3. 카테고리별 게시글 개수와 카테고리명을 출력해 주세요.
        // SELECT cat.no, cat.name, COUNT(cat.no)
        // FROM boards AS boa
        //      JOIN categories AS cat ON boa.categories_no = cat.no
        // GROUP BY cat.no, cat.name;
        // 표준 문법을 맞추려면 GROUP BY 에서 SELECT에 사용한 거를 써줘야 함
        $result = DB::select(
            'SELECT cat.no
            ,cat.name
            ,Count(cat.no)
            FROM boards boa
                JOIN categories cat
                    ON boa.categories_no = cat.no
            GROUP BY cat.no
            ,cat.name'
            );

        // ------------------------------------INSERT
        $sql = 
            'INSERT INTO boards(
                title
                ,content
                ,created_at
                ,updated_at
                ,categories_no
            )
            VALUES(?, ?, ?, ?, ?)';
        $arr = [
            '제목1'
            ,'내용내용1'
            ,now()
            ,now()
            ,'0'
        ];
        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();

        // $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');

        // ------------------------------------UPDATE
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title = ?, content = ? WHERE id = ?'
        // , ['업데이트1', '업업', $result[0]->id]
        //     );      
        // DB::commit();
    
        // ------------------------------------DELETE
        // DB::beginTransaction();
        // DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
        // DB::commit();

        // -----------
        // 쿼리빌더 체이닝
        // -----------
        // SELECT * FROM boards WHERE id = 300;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->get();

        // SELECT * FROM boards WHERE id = 300 or id = 400;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id', '=', 400)
            ->get();

        // SELECT * FROM boards WHERE id = 300 or id = 400 ORDER BY id DESC;
        $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orWhere('id', '=', 400)
            ->orderBy('id', 'desc')
            ->get();

        // SELECT * FROM categories WHERE no in (?, ?, ?);
        $result = 
            DB::table('categories')
            ->whereIn('no', [1, 2, 3])
            ->get();

        // SELECT * FROM categories WHERE no not in (?, ?, ?);
        $result = 
        DB::table('categories')
        ->whereNotIn('no', [1, 2, 3]) // 1, 2, 3을 제외한 나머지가 옴
        ->get();

        // first() : limit1하고 비슷하게 동작
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count() : 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();
        
        // max() : 해당 컬럼의 최대값
        $result = DB::table('categories')->max('no');

        // 게시글 정보(타이틀, 내용) + 카테고리명 까지 출력 100개 출력
        $result = 
            DB::table('boards')
            ->select('boards.title', 'boards.content', 'categories.name')
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->limit(100)
            ->get();
        
        // 카테고리별 게시글 개수와 카테고리명을 출력해 주세요.
        $result = 
            DB::table('boards')
            ->select('categories.name', 'categories.no', DB::raw('count(categories.no)'))
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->groupBy('categories.no', 'categories.name')
            ->get();



        return var_dump($result);
    }
}

