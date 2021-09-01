@extends('layout.main')

@section('content')
    {{-- @foreach ($Datas as $data)
        <div>
            {{ $data }}
        </div>
    @endforeach --}}

    <div>
        {{ $Datas }}
    </div>
    <div>
        databases테이블의 레코드 수 : {{ $count }}
    </div>

    {{-- <div>
        {{ $Datas }}
    </div> --}}
@endsection