@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">My threads</div>

                    <table class="table table-striped">
                        <thead class="thead-default">
                        <tr>
                            <th>Title</th>
                            <th class="text-center">Responses</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myThreads as $thread)
                            <tr>
                                <td>
                                    <a href="{{ url('thread', ['id' => $thread->id]) }}">{{ $thread->title }}</a>
                                </td>
                                <td class="text-center">
                                    {{ $commentsPerThread[$thread->id] }}
                                </td>
                                <td class="text-center"><a href="" class="btn btn-info">Edit</a></td>
                                <td class="text-center"><a href="" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $myThreads->links() }}
                    </div>

                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">My responses</div>

                    <table class="table table-striped">
                        <thead class="thead-default">
                        <tr>
                            <th>Content</th>
                            <th>Thread</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myComments as $comment)
                            <tr>
                                <td>
                                    {{ $comment->content }}
                                </td>
                                <td>
                                    {{ $comment->topic->title }}
                                </td>
                                <td class="text-center"><a href="" class="btn btn-info">Edit</a></td>
                                <td class="text-center"><a href="" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $myComments->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection