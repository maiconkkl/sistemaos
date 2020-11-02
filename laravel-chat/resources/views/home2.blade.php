@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <group-chat :group ="{{ $group }}" :conversation-db ="{{ $conversationDb }}"></group-chat>
            </div>
        </div>
    </div>
@endsection
