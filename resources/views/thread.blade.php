@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $thread->title }} <i>posted by <b>{{ $thread->user->name }}</b>
                        <span class="pull-right">{{ $thread->created_at->diffForHumans() }}</span></i></h3>
                    </div>

                    <div class="panel-body">
                        {{ $thread->content }}
                    </div>
                </div>
                    @foreach($comments as $comment)
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>{{ $comment->user->name }}</b> <i>said :
                                        <span class="pull-right">{{ $comment->updated_at->diffForHumans() }}</span></i></h3>
                            </div>

                            <div class="panel-body">
                                {{ $comment->content }}
                            </div>
                        </div>
                    @endforeach

                <div class="panel panel-info">
                    <div class="panel-body">
                        {!! Form::open(['url' => 'post-comment']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Message...', 'required' => 'required']) !!}
                        </div>
                            {!! Form::hidden('threadId', $thread->id) !!}
                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
