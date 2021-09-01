<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name', 3);
            $table->string('airline');
            $table->timestamps();
        });

        //이미 존재하는 테이블의 이름을 바꾸려면 rename 메소드를 이용하십시오:
        //Schema::rename('flights', 'changeName');

        // 이미 존재하는 테이블을 제거하려면 drop이나 dropIfExists 메소드를 사용하세요:
        // Schema::drop('users');
        // Schema::dropIfExists('users');


        //기존의 컬럼값 바꾸기 
        //composer require doctrine/dbal -> 사전 환경설정
        Schema::table('flights', function (Blueprint $table) {
            //기존 flights테이블의 name속성의 string제한을 3에서 30으로 바꾸고 null도 가능하게 했다.
            $table->string('name', 30)->nullable()->change();
            //기존의 컬럼명을 name에서 userName으로 변경
            $table->renameColumn('name', 'userName');
            //기존 컬럼 삭제
            // $table->dropColumn('airline');
            // 배열로 보내어 여러개 삭제가능
            // $table->dropColumn(['votes', 'avatar', 'location']);
        });

        //인덱스 생성
        // $table->string('email')->unique();
        // 위와 같이 하는 대신에, 컬럼을 정의한 뒤에 인덱스를 생성할 수도 있습니다. 예를 들어:
        // $table->unique('email');
        // 인덱스 메소드에 컬럼의 배열을 전달하여 결합(복합) 인덱스를 생성할 수도 있습니다.
        // $table->index(['account_id', 'created_at']);
        // 라라벨은 테이블, 컬럼 이름 및 인덱스 유형을 기반으로 인덱스 이름을 자동으로 생성하지만 메소드의 두번째 인자로 인덱스 이름을 지정할 수도 있습니다.
        // $table->unique('email', 'unique_email');

        //외래키 설정
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->unsignedBigInteger('user_id');

        //     $table->foreign('user_id')->references('id')->on('users');
        // });
        // 이 구문은 다소 장황하므로 라라벨은 더 나은 개발자 경험을 제공하기 위해 규칙을 사용하는 추가의 terser 메소드를 제공합니다. 위의 예제는 다음과 같이 작성할 수 있습니다.
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->foreignId('user_id')->constrained('user');
        // });

        // 제약조건(constraint)의 "on delete"와 "on update" 속성에 원하는 동작을 지정할 수도 있습니다.
        // $table->foreignId('user_id')
        //     ->constrained()
        //     ->onDelete('cascade');
        // 추가 column modifiers는 constrained 전에 호출해야합니다.
        // $table->foreignId('user_id')
        //     ->nullable()
        //     ->constrained();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
