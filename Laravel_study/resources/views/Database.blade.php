@extends('layout.main')

@section('content')
    {{-- @foreach ($Datas as $data)
        <div>
            {{ $data }}
        </div>
    @endforeach --}}

    {{-- <div>
        {{ $Datas }}
    </div>
    <div>
        databases테이블의 레코드 수 : {{ $count }}
    </div> --}}

    {{-- <div>
        {{ $Datas }}
    </div> --}}

    @php
        // $Users = App\Models\User::all();

        // foreach ($Users as $User) {
        //     echo $User->name;
        //     echo "</br>";
        // }

        //모델의 리프레쉬 fresh / refresh
        //fresh
        //fresh 메소드는 데이터베이스로부터 모델을 다시 검색 할 것입니다. 기존 모델 인스턴스는 영향을받지 않습니다
        // $flight = App\Models\Flight::where('number', 'FR 900')->first();
        // $freshFlight = $flight->fresh();
        
        //refresh
        //메소드는 데이터베이스의 새로운 데이터를 사용하여 기존 모델을 갱신합니다. 또한 로드 된 모든 관계가 새로 고쳐집니다.
        // $flight = App\Models\Flight::where('number', 'FR 900')->first();
        // $flight->number = 'FR 456';
        // $flight->refresh();
        // $flight->number; // "FR 900"

        // chunk 메소드는 "분할된" Eloquent 모델들을 가져올 것이며 주어진 Closure에 의해서 처리될 것입니다.
        // chunk 메소드를 이용하면 결과가 아주 큰 경우 메모리를 절약할 수 있을 것입니다.
        // App\Models\User::chunk(200, function ($Users) {
        //     foreach ($Users as $User) {
        //         echo $User->name;
        //         echo "</br>";
        //     }
        // });
        
        //cursor 메소드는 단 하나의 쿼리를 실행하는 커서를 사용하여 데이터베이스 레코드 전체를 반복할 수 있게 합니다. 
        //대량의 데이터를 처리하는 경우에, cursor 메소드는 메모리 사용량을 크게 줄여줍니다.
        // foreach (App\Models\User::cursor() as $User) {
        //     echo $User->email;
        //     echo "</br>";
        // }

        //cursor 는 Illuminate\Support\LazyCollection 인스턴스를 반환합니다. 
        //Lazy collections 을 사용하면 하나의 모델을 메모리에 불러오는동안 일반적인 많은 라라벨 컬렉션 메소드를 사용할 수 있습니다.
        $Users = App\Models\User::cursor()->filter(function ($user) {
            return $user->id > 5;
        });

        foreach ($Users as $User) {
            echo $User->name;
            echo "</br>";
        }


    @endphp
    
@endsection