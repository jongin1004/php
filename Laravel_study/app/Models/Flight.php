<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    //관례적으로 연관된 테이블을 별도로 지정하지 않는다면 클래스 이름의 복수형을 "스네이크 케이스" 로 변환한 이름이 사용
    //아래처럼 직접 설정해줄 수도 있음
    // protected $table = 'my_flights';

    //Eloquent는 테이블의 primary key 컬럼의 이름을 id로 추정합니다. protected $primaryKey 속성을 통해서 이 컬럼명을 재정의할 수 있습니다.
    //protected $primaryKey = 'flight_id';

    // created_at 과 updated_at 컬럼이 자동으로 채워지는 것을 원치 않을 경우
    // public $timestamps = false;

    //타임스탬프의 포맷을 변경하여야 한다면 모델에 $dateFormat 속성을 지정하면 됩니다
    // protected $dateFormat = 'U';

    //만약 타임스탬프를 저장하는 필드의 이름을 수정하고자 하는 경우, 모델에 CREATED_AT 그리고 UPDATED_AT 상수를 설정하면 됩니다.
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

    //일부 모델의 속성에 대한 기본값을 정의하고 싶다면 모델의 $attributes에 속성을 정의 할 수 있습니다.
    // protected $attributes = [
    //     'delayed' => false,
    // ];
}
