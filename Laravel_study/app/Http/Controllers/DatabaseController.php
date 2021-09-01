<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
    public function index() {
        // DB::transaction(function () {
        //     DB::table('databases')->delete();
        // });

        // return view('Database');

        // $Datas = DB::table('databases')->get();

        $Datas = DB::table('databases')->find(3);

        //한개의 컬럼의 값들을 포함하고 있는 컬렉션을 조회하고자 할 경우 pluck사용
        //모든 레콛드에서 user속성 값만 가져온다.
        $Datas = DB::table('databases')->pluck('user');


        //데이터베이스 레코드가 많은 작업을 수행해야 한다면, chunk 메소드를 사용
        //-> 청킹 중 레코드를 업데이트 할 때는 항상 chunkById 메소드를 사용하는 것이 좋습니다.
        //databases테이블에서 number속성 값이 3보다 작은 레코드들
        DB::table('databases')->where('number', '<' , 3)
        ->chunkById(100, function ($datas) { //100은 테이블에서 한번에 가져올 레코드 수 
            foreach ($datas as $data) { 
                DB::table('databases')
                    ->where('id', $data->id)
                    ->update(['number' => 100]); //위에서 가져온 레코드들(number가 3보다 작은 레코드들)의 number 속성을 100으로 변환
            }
        });

        //집계함수들 다 사용할 수 있음 count, sum, max, min, avg
        $count = DB::table('databases')->count();

        //해당 조건을 만족하는 레코드가 존재하면 1 출력, 없으면 null
        // $Datas = DB::table('databases')->where('id', 2)->exists();
        //해당 조건을 만족하는 레코드가 존재하면 null, 없으면 1
        // $Datas = DB::table('databases')->where('id', 1)->doesntExist();

        //select를 이용해서 원하는 컬럼만 
        $Datas = DB::table('databases')->select('user', 'number')->get();
        //distinct를 사용하면 속성값이 중복된 것은 제외
        // $users = DB::table('users')->distinct()->get();

        //이미 쿼리빌더 인스턴스를 가지고 있고, 존재하는 select 구문에 선택할 컬럼을 추가하고자 한다면, addSelect 메소드를 사용할 수 있습니다.
        // $query = DB::table('users')->select('name');
        // $users = $query->addSelect('age')->get();   


        //때로는, 쿼리에서 Raw Expressions를 사용하고자 할 수도 있습니다. raw expression 을 생성하기 위해서는 DB::raw 메소드를 사용할 수 있습니다.
        // $users = DB::table('users')
        //              ->select(DB::raw('count(*) as user_count, status'))
        //              ->where('status', '<>', 1)
        //              ->groupBy('status')
        //              ->get();

        //DB::raw를 간단히 selectRaw로 사용가능 
        // $orders = DB::table('orders')
        //         ->selectRaw('price * ? as price_with_tax', [1.0825])
        //         ->get();

        //whereRaw 와 orWhereRaw 메소드는 쿼리의 where 절에 raw 한 구문을 삽입하는데 사용할 수 있습니다. 이 메소드도 옵션 배열을 두번째 인자로 받습니다.
        // $orders = DB::table('orders')
        //         ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
        //         ->get();


        //join 메소드에 전달되는 첫번째 인자는 join을 수행할 테이블의 이름이며, 구 이후는 join 을 실행할 때 컬럼의 제약 조건입니다.
        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        //좀 더 복잡한 join
        //join 메소드의 두번째 인자로 Closure 를 전달하십시오. Closure 는 JoinCaluse 객체를 전달 받아, join 구문에 제약사항을 지정할 것입니다.
        // DB::table('users')
        // ->join('contacts', function ($join) {
        //     $join->on('users.id', '=', 'contacts.user_id')
        //          ->where('contacts.user_id', '>', 5);
        // })
        // ->get();


        //Where절
        //아래처럼 =일때는 생략가능
        // $users = DB::table('users')->where('votes', '=', 100)->get();
        // $users = DB::table('users')->where('votes', 100)->get();

        // $users = DB::table('users')
        //         ->where('votes', '>=', 100)
        //         ->get();

        // $users = DB::table('users')
        //                 ->where('votes', '<>', 100)
        //                 ->get();

        // $users = DB::table('users')
        //                 ->where('name', 'like', 'T%')
        //                 ->get();

        //where은 배열로 보내는 것도 가능
        // $users = DB::table('users')->where([
        //     ['status', '=', '1'],
        //     ['subscribed', '<>', '1'],
        // ])->get();

        //or구문
        // $users = DB::table('users')
        //             ->where('votes', '>', 100)
        //             ->orWhere('name', 'John')
        //             ->get();
        
        //괄호 안에 "or"조건을 그룹화해야하는 경우 orWhere 메소드의 첫 번째 인수로 클로저를 전달할 수 있습니다.
        // $users = DB::table('users')
        // ->where('votes', '>', 100)
        // ->orWhere(function($query) {
        //     $query->where('name', 'Abigail')
        //           ->where('votes', '>', 50);
        // })
        // ->get();


        //between
        // $users = DB::table('users')
        //    ->whereBetween('votes', [1, 100])
        //    ->get();

        //Not Between
        // $users = DB::table('users')
        //             ->whereNotBetween('votes', [1, 100])
        //             ->get();

        
        //whereIn 주어진 배열안에 속하는지 
        // $users = DB::table('users')
        //             ->whereIn('id', [1, 2, 3])
        //             ->get();

        //whereNotIn 주어진 배열안에 안속하는지
        // $users = DB::table('users')
        //             ->whereNotIn('id', [1, 2, 3])
        //             ->get();

        //whereNull 속성이 null값인지
        // $users = DB::table('users')
        //             ->whereNull('updated_at')
        //             ->get();

        //whereNotNull null이 아닌지
        // $users = DB::table('users')
        //             ->whereNotNull('updated_at')
        //             ->get();

        // whereDate 메소드는 컬럼의 값이 date 값인지 비교하는데 사용됩니다.

        // $users = DB::table('users')
        //                 ->whereDate('created_at', '2016-12-31')
        //                 ->get();
        // whereMonth 메소드는 컬럼의 값이 한해의 지정된 달과 같은지 비교하는데 사용됩니다.

        // $users = DB::table('users')
        //                 ->whereMonth('created_at', '12')
        //                 ->get();
        // whereDay 메소드는 컬럼의 값이 한달의 지정된 일과 같은지 비교하는데 사용됩니다.

        // $users = DB::table('users')
        //                 ->whereDay('created_at', '31')
        //                 ->get();

        // whereYear 메소드는 컬럼의 값이 지정된 년도와 같은지 비교하는데 사용됩니다.

        // $users = DB::table('users')
        //                 ->whereYear('created_at', '2016')
        //                 ->get();
        // whereTime 메소드는 컬럼의 값을 특정 시간과 비교하는데 사용할 수 있습니다.

        // $users = DB::table('users')
        //                 ->whereTime('created_at', '=', '11:20:45')
        //                 ->get();
        // whereColumn / orWhereColumn

        // whereColumn 메소드는 두개의 컬럼이 동일하는 것을 확인하는데 사용할 수 있습니다.

        // $users = DB::table('users')
        //                 ->whereColumn('first_name', 'last_name')
        //                 ->get();
        // 또한 비교 연산자를 메소드에 전달할 수도 있습니다.

        // $users = DB::table('users')
        //                 ->whereColumn('updated_at', '>', 'created_at')
        //                 ->get();
        // whereColumn메소드는 또한 다수의 조건 배열을 전달 받을 수도 있습니다. 이 조건들은 and 연산자를 사용하여 연결됩니다.

        // $users = DB::table('users')
        //                 ->whereColumn([
        //                     ['first_name', '=', 'last_name'],
        //                     ['updated_at', '>', 'created_at'],
        //                 ])->get();


        //괄호 안에 제약조건을 그룹으로 묶는것이 가능
        // $users = DB::table('users')
        //    ->where('name', '=', 'John')
        //    ->where(function ($query) {
        //        $query->where('votes', '>', 100)
        //              ->orWhere('title', '=', 'Admin');
        //    })
        //    ->get();
        //select * from users where name = 'John' and (votes > 100 or title = 'Admin') 위의 코드는 이것과 같은 동작


        //where exists를 사용 
        // $users = DB::table('users')
        //    ->whereExists(function ($query) {
        //        $query->select(DB::raw(1))
        //              ->from('orders')
        //              ->whereRaw('orders.user_id = users.id');
        //    })
        //    ->get();

        //select * from users
            // where exists (
            //     select 1 from orders where orders.user_id = users.id
            // ) 위의 코드는 이것과 같음 

        
        //JSON where절 
        // $users = DB::table('users')
        //     ->whereJsonContains('options->languages', 'en')
        //     ->get();


        //orderBy 원하는 만큼 추가가능
        // $users = DB::table('users')
        //         ->orderBy('name', 'desc')
        //         ->orderBy('email', 'asc')
        //         ->get();

        // latest 와 oldest 메소드는 여러준이 손쉽게 날짜를 기반으로 결과를 정렬
        // created_at 컬럼을 기준으로 정렬됩니다
        // $user = DB::table('users')
        //         ->latest()
        //         ->first();

        //랜덤하게 불러오고 싶은경우 
        // $randomUser = DB::table('users')
        //         ->inRandomOrder()
        //         ->first();

        //reorder를 사용하면 기존의 정렬을 초기화, 새로 정렬을 해줄 수 있음
        // $query = DB::table('users')->orderBy('name');
        // $usersOrderedByEmail = $query->reorder('email', 'desc')->get();

        
        //groupBy / having
        // groupBy 메소드에 여러개의 인자를 전달 할 수 있습니다
        // 복잡한 having은 havingRaw를 사용
        // $users = DB::table('users')
        //         ->groupBy('account_id')
        //         ->having('account_id', '>', 100)
        //         ->get();


        //skip과 take
        //skip은  주어진 개수만큼 결과를 건너뛰기 위해서
        //take는 반환되는 결과의 개수를 제한
        // $users = DB::table('users')->skip(10)->take(5)->get();

        //대신에, limit 과 offset 메소드를 사용할 수도 있습니다.
        // $users = DB::table('users')
        //         ->offset(10)
        //         ->limit(5)
        //         ->get();

        //현재의 요청에서 주어진 입력값이 존재할 때에만 where 구문을 적용하고 싶을 수도 있습니다. 이 경우 when 메소드를 사용할 수 있습니다.
        //when 메소드는 첫번째 파라미터가 true 일때 주어진 클로저를 실행합니다. 첫번째 파라미터가 false 라면 클로저는 실행되지 않을 것입니다.
        //when 메소드의 세번째 파라미터로 또다른 클로저를 전달할 수 있습니다. 이 클로저는 첫번째 파라미터가 false 일때 실행됩니다
        // $sortBy = null
        // $users = DB::table('users')
        //         ->when($sortBy, function ($query, $sortBy) {
        //             return $query->orderBy($sortBy);
        //         }, function ($query) {
        //             return $query->orderBy('name');
        //         })
        //         ->get();


        //insert
        // DB::table('users')->insert(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );

        // insertGetId 메소드를 사용하여 레코드를 추가하고, 추가된 ID를 획득할 수 있습니다.
        // $id = DB::table('users')->insertGetId(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );

        //Update
        // $affected = DB::table('users')
        //       ->where('id', 1)
        //       ->update(['votes' => 1]);

        //updateOrInsert 메소드는 일치하는 레코드가 없는 경우 레코드를 만들 수도 있습니다. 
        //updateOrInsert 메소드는 첫 번째 인자의 컬럼과 값의 쌍을 사용하여 일치하는 데이터베이스 레코드를 찾습니다. 
        // 레코드가 있으면 두 번째 인수의 값으로 업데이트됩니다. 레코드를 찾을 수 없으면 두 레코드의 병합 된 특성과 함께 새 레코드가 삽입됩니다.
        // DB::table('users')
        // ->updateOrInsert(
        //     ['email' => 'john@example.com', 'name' => 'John'],
        //     ['votes' => '2']
        // );


        //증가 / 감소
        //두번째 인자는 증감될 단위 
        // DB::table('users')->increment('votes');
        // DB::table('users')->increment('votes', 5);
        // DB::table('users')->decrement('votes');
        // DB::table('users')->decrement('votes', 5);  

        // 또한 이 작업을 수행동안 업데이트 되어야할 컬럼을 추가적으로 지정할 수도 있습니다.
        // DB::table('users')->increment('votes', 1, ['name' => 'John']);

        //delete
        // DB::table('users')->delete();
        // DB::table('users')->where('votes', '>', 100)->delete();

        //truncate는 모든레코드를 삭제시키고 id값도 0으로 초기화시켜줍니다.
        // DB::table('databases')->truncate();

        //쿼리를 작성하는 동안 쿼리 바인딩과 SQL을 출력하기 위해 dd 또는 dump 메소드를 사용 할 수 있습니다.
        //dd 메소드는 디버그 정보를 표시하고 요청 실행을 중단합니다. dump 메소드는 디버그 정보를 보여 주지만 요청이 계속 실행되도록합니다.
        // DB::table('databases')->where('number', '<', 5)->dd(); //"select * from `databases` where `number` < ?"
        // DB::table('databases')->where('number', '<', 5)->dump(); //"select * from `databases` where `number` < ?"


        // php artisan schema:dump --prune
        //위는 아티즌 커맨드인데, migration파일이 많아졌을 경우에는 사이즈가 비대해질 수 있으니
        //그것을 하나의 파일로 응축시켜서 migrate해줄 수 있다. --prune옵션은 기존의 migration을 전부 삭제시킵니다. 
        //database/schema 폴터를 확인해보면, dump파일이 생긴것을 확인 가능
        return view('Database', [
            'Datas' => $Datas,
            'count' => $count,
        ]);
    }
}
