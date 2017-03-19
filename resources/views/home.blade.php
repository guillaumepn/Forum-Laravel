@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">List of threads</div>

                <table class="table table-striped">
                    <thead class="thead-default">
                    <tr>
                        <th>Title</th>
                        <th class="text-center">Responses</th>
                        <th>Author</th>
                        <th>Last message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($threads as $thread)
                        <tr>
                            <td>
                                <a href="{{ url('thread', ['id' => $thread->id]) }}">{{ $thread->title }}</a>
                            </td>
                            <td class="text-center">
                                {{ $commentsPerThread[$thread->id] }}
                            </td>
                            <td>{{ $thread->user->name }}</td>
                            <td>{{ $thread->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $threads->links() }}
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'post-thread']) !!}
                    <div class="form-group">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Message...', 'required' => 'required']) !!}
                    </div>
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
