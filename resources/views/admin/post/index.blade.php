@extends('layouts.admin')

@section('content-header')
    <h1>文章管理<small>所有文章</small></h1>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">所有文章</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>标签</th>
                        <th>分类</th>
                        <th>创建</th>
                        <th>更新</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->user->username }} </td>
                            <td>
                                @if(count($post->tags) >0)
                                        @foreach($post->tags as $tag)
                                            <span class="label label-success">{{ $tag->name }}</span>
                                        @endforeach
                                @else
                                    无
                                @endif
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url('/post', ['id' => $post->id]) }}" class="btn btn-xs btn-success" target="_blank" rel="noopener"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" data-original-title="查看"></i></a>
                                <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" data-original-title="编辑"></i></a>
                                <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" data-original-title="删除"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pull-right">
                {!! $posts->render() !!}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection