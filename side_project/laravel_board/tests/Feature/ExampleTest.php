<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // php artisan make:test 파일명
    // 테스트 파일명의 끝이 Test로 끝날 것

    // php artisan test 테스트 실행
    
    use RefreshDatabase; // 테스트 완료 후 DB 초기화를 위한 트레이드
    

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
