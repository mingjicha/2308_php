<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    // 트레이트 설정
    use HasFactory, SoftDeletes;

    // DB값들 디폴트 설정
    protected $attributes = [
        'completed' => '0', 
    ];

    // 화이트 리스트 설정
    protected $fillable = [
        'content'
    ];

    // 데이트 설정
    // 라라벨에서 created_at, updated_at, deleted_at은 데이트 타입을 자동으로 잡아주고
    // completed_at은 자동으로 안 잡아주니까 설정해줘야 함

    protected $dates = [
        'completed_at'
    ];

    // API로 JSON을 파싱할 때 TimeZone을 맞추는 설정
    // 라라벨이 영국기준이라 우리가 사용할 수 있게 변경해야 함 
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}
