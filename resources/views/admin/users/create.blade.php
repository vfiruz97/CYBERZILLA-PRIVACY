@extends('layouts.app')

@section('content')
<div class="container">
    @include('admin.users.includes.create.error_messages')
    <form method="POST" action="{{ route('admin.user.store') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('admin.users.includes.create.item_main_col')
            </div>
            <div class="col-md-3">
                @include('admin.users.includes.create.item_add_col')
            </div>
        </div>
    </form>
</div>
@endsection
