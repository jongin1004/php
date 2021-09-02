<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function store(Request $request) {
        //데이터베이스에 새로운 레코드를 생성하기 위해는, 새 모델의 인스턴스를 생성하고 모델의 속성을 설정하여, save 메소드를 호출하면 됩니다
        $flight = new Flight;
        // HTTP 요청에서 확인된 name 파라미터를 App\Models\Flight 모델 인스턴스의 name 속성에 지정합니다. 
        $flight->name = $request->name;
        //save 메소드를 호출하면 데이터베이스에 레코드가 추가 될 것입니다. 
        //save 메소드를 호출하면 created_at와 updated_at 타임스탬프가 자동으로 설정되며 수동으로 지정할 필요가 없습니다.
        $flight->save();


        $user = User::create([
            'first_name' => 'Taylor',
            'last_name' => 'Otwell',
            'title' => 'Developer',
        ]);

        $user->title = 'Painter';
        //isDirty 메소드는 모델이 로드 된 후 속성이 변경되었는지 여부를 판별합니다. 특정 속성이 더티인지 확인하기 위해 특정 속성 이름을 전달할 수 있습니다.
        $user->isDirty(); // true
        $user->isDirty('title'); // true
        $user->isDirty('first_name'); // false
        // isClean 메소드는 isDirty와 반대며 선택적 속성 인수도 허용합니다.
        $user->isClean(); // false
        $user->isClean('title'); // false
        $user->isClean('first_name'); // true

        $user->save();

        $user->isDirty(); // false
        $user->isClean(); // true

        //wasChanged 메소드는 현재 요청주기 내에 모델이 마지막으로 저장 될 때 속성이 변경되었는지 여부를 판별합니다. 
        //특정 속성이 변경되었는지 확인하기 위해 속성 이름을 전달할 수도 있습니다.
        $user = User::create([
            'first_name' => 'Taylor',
            'last_name' => 'Otwell',
            'title' => 'Developer',
        ]);

        $user->title = 'Painter';
        $user->save();

        $user->wasChanged(); // true
        $user->wasChanged('title'); // true
        $user->wasChanged('first_name'); // false


        //getOriginal 메소드는 모델이 로드 된 이후의 변경된 사항에 관계없이 모델의 원래 속성을 포함하는 배열을 반환합니다. 
        //특정 속성 이름을 전달하여 특정 속성의 원래 값을 가져올 수 있습니다.
        $user = User::find(1);

        $user->name; // John
        $user->email; // john@example.com

        $user->name = "Jack";
        $user->name; // Jack

        $user->getOriginal('name'); // John
        $user->getOriginal(); // Array of original attributes...
    }

    public function update() {
        //save 메소드는 데이터베이스에 이미 존재하는 모델들을 업데이트 하기 위해 사용될 수 있습니다.
        $flight = App\Models\Flight::find(1);
        //업데이트하기 원하는 속성을 수정한 뒤 save 메소드를 호출
        $flight->name = 'New Flight Name';
        $flight->save();

        //주어진 쿼리에 일치하는 여러개의 모델들에 대해서 업데이트를 할 수 있습니다. 
        //다음의 예제에서는 active 하면서, destination 이 San Diego 인 모든 비행편들이 연기되었다고 표시될 것입니다.
        App\Models\Flight::where('active', 1)
          ->where('destination', 'San Diego')
          ->update(['delayed' => 1]);
    }

    public function fristOrCreate() {
        //firstOrCreate 메소드는 주어진 컬럼 / 값의 쌍을 이용하여 데이터베이스 레코드를 찾으려고 시도할 것입니다. 
        //데이터베이스에서 모델을 찾을 수 없으면 주어진 첫번째 속성과 두번째 속성을 기반으로 새로운 레코드를 입력합니다.
        //firstOrCreate와 같이 firstOrNew 메소드도 주어진 속성들에 해당하는 레코드를 데이터베이스에서 찾으려고 시도할 것입니다. 
        //하지만 모델을 찾을 수 없으면 새로운 모델 인스턴스가 반환될 것입니다. firstOrNew에 의해 반환된 모델은 아직 데이터베이스에서 저장되지 않았다는 점에 주의하십시오.
        // 모델을 저장하기 위해서는 save를 수동으로 호출해야 합니다.

        // Retrieve flight by name, or create it if it doesn't exist...
        $flight = App\Models\Flight::firstOrCreate(['name' => 'Flight 10']);

        // Retrieve flight by name, or create it with the name, delayed, and arrival_time attributes...
        $flight = App\Models\Flight::firstOrCreate(
            ['name' => 'Flight 10'],
            ['delayed' => 1, 'arrival_time' => '11:30']
        );

        // Retrieve by name, or instantiate...
        $flight = App\Models\Flight::firstOrNew(['name' => 'Flight 10']);

        // Retrieve by name, or instantiate with the name, delayed, and arrival_time attributes...
        $flight = App\Models\Flight::firstOrNew(
            ['name' => 'Flight 10'],
            ['delayed' => 1, 'arrival_time' => '11:30']
        ); 
    }

    public function updateOrCreate() {
            //또한 모델이 존재하는 경우에 이를 업데이트하고, 존재하지 않는 경우에는 새로운 모델을 생성할 수도 있습니다. 
            //라라벨은 이런 경우 한번에 처리할 수 있는 updateOrCreate 메소드를 제공합니다. firstOrCreate메소드 처럼 updateOrCreate 모델을 직접 저장하므로, 
            //save() 메소드를 호출할 필요가 없습니다.
            $flight = App\Models\Flight::updateOrCreate(
                ['departure' => 'Oakland', 'destination' => 'San Diego'],
                ['price' => 99, 'discounted' => 1]
            );
    }

    public function delete() {
        $flight = App\Models\Flight::find(1);

        $flight->delete();

        //위의 예제에서는 delete 메소드를 호출하기 전에 데이터베이스에서 모델을 조회합니다. 
        //하지만 모델의 기본 키를 알고 있다면 모델을 명시적으로 조회하지 않고 바로 삭제할 수 있습니다. 
        App\Models\Flight::destroy(1);
        
        //destroy 메소드는 단일 기본 키를 인수로 사용하는 것 이외에도 여러개의 기본 키, 기본 키의 배열 또는 기본키의 collection를 허용합니다.
        App\Models\Flight::destroy(1, 2, 3);
        App\Models\Flight::destroy([1, 2, 3]);
        App\Models\Flight::destroy(collect([1, 2, 3]));
    }

    //대량 수정과 같이 대량으로 삭제하는 것은 삭제된 모델에 대한 어떠한 모델 이벤트도 발생시키지 않을 것입니다.
    $deletedRows = App\Models\Flight::where('active', 0)->delete();

    //소프트삭제(임시삭제)
    //모델이 소프트 삭제되는 것을 허용하기 위해 모델에 Illuminate\Database\Eloquent\SoftDeletes 속성을 사용하세요
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Flight extends Model
    {
        use SoftDeletes;
    }


    //데이터베이스 테이블에 deleted_at 컬럼을 추가해야 합니다. 라라벨의 스키마 빌더는 이 컬럼을 생성하는 도우미 메소드를 가지고 있습니다.
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
    //위의 설정이 끝나면 이제 소프트 삭제 사용가능
    //이제 모델에 delete 메소드를 호출하면 deleted_at 컬럼은 현재 날짜와 시간에 맞춰질 것입니다. 
    //또한 소프트 삭제된 모델을 쿼리할 때 소프트 삭제된 모든 모델은 자동적으로 쿼리 결과에서 제외됩니다.

    //주어지 모델 인스턴스가 소프트 삭제되었는지 확인하려면 trashed 메소드를 사용하세요
    if ($flight->trashed()) {
        //
    }

    //위에서 본 바와 같이, 소프트 삭제된 모델들은 쿼리 결과에서 자동으로 제외됩니다. 
    //하지만 쿼리에 withTrashed 메소드를 쓰면 결과 세트에 소프트 삭제된 모델도 나타나도록 강제할 수 있습니다.
    $flights = App\Models\Flight::withTrashed()
                ->where('account_id', 1)
                ->get();

    // withTrashed 메소드는 관계 쿼리에서도 사용될 수 있습니다.
    $flight->history()->withTrashed()->get();

    // onlyTrashed 메소드는 소프트 삭제된 모델만 가져옵니다.
    $flights = App\Models\Flight::onlyTrashed()
                    ->where('airline_id', 1)
                    ->get();

    //때로는 소프트 삭제된 모델의 삭제를 취소하고 싶을 수도 있습니다. 소프트 삭제된 모델을 활성화 상태로 복구하려면 모델 인스턴스에 restore 메소드를 사용하면 됩니다.
    $flight->restore();

    // 여러 개의 모델을 빠르게 복구할 때도 restore 메소드를 쿼리에 사용할 수 있습니다. 
    // 다시한번 말하지만, 다른 "대량" 실행들처럼, 복구되는 모델에 대한 어떠한 모델 이벤트도 발생하지 않습니다.
    App\Models\Flight::withTrashed()
        ->where('airline_id', 1)
        ->restore();

    // withTrashed 메소드 같이 restore 메소드도 관계에 쓰일 수 있습니다.
    $flight->history()->restore();

    //데이터베이스에서 완전히 모델을 삭제해야 할 때가 있을 것입니다. 데이터베이스에서 소프트 삭제된 모델을 영구적으로 삭제하기 위해서는 forceDelete 모델을 사용하면 됩니다.
    // Force deleting a single model instance...
    $flight->forceDelete();

    // Force deleting all related models...
    $flight->history()->forceDelete();

    //모델복제
    //이미 모델 인스턴스를 가지고 있다면, fill 메소드에 배열을 전달하여 속성을 구성할 수 있습니다.
    $flight->fill(['name' => 'Flight 22']);

    //replicate 메소드를 사용하여 모델 인스턴스의 저장되지 않은 사본을 생성 할 수 있습니다. 
    //이것은 많은 동일한 속성을 공유하는 모델 인스턴스가 있을 때 특히 유용합니다.
    $shipping = App\Models\Address::create([
        'type' => 'shipping',
        'line_1' => '123 Example Street',
        'city' => 'Victorville',
        'state' => 'CA',
        'postcode' => '90001',
    ]);

    $billing = $shipping->replicate()->fill([
        'type' => 'billing'
    ]);

    $billing->save();


}
