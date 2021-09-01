@extends('layout.main')

@section('content')
    <div class="flex-1 h-full bg-gray-700 text-white">
        <set-detail :to-do-id="{{ $id }}"/>
    </div>    
@endsection