@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $thread->title }} <i>posted by <b>{{ $thread->user->name }}</b>
                        <span class="pull-right">{{ $thread->updated_at->diffForHumans() }}</span></i></h3>
                    </div>

                    <div class="panel-body">
                        {{ $thread->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
