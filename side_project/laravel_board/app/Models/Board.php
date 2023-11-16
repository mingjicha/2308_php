<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 셀렉트 할 때도 삭제 컬럼에 날짜가 들어가 있는 건 조회가 안 됨

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'b_id';
    
    protected $fillable = [
        'b_title',
        'b_content',
    ];
}
