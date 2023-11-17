<?php

// php artisan make:model Item -m 
// Item이란 model을 만들고 -m을 하면 migrations까지 만듦

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // pk인 id
            $table->string('content'); // 내용  string하면 디폴트로 바캐릭터 255로 잡아줌  
            $table->char('completed', 1); // 완료 여부
            $table->timestamp('completed_at')->nullable(); //완료
            $table->timestamps(); // 작성일자, 수정일자
            $table->softDeletes(); // 라라벨식 deleted_at
        });
    }
    // 생성되는지 확인 php artisan migrate 
    // Yes하고 done 뜨면 생성 완료

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
