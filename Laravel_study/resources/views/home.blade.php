@extends('layout.main')

@section('content')
    <div class="h-full bg-gray-700 text-white">
        <to-do-detail :to-do-id="{{ $id }}"/>
    </div>
@endsection