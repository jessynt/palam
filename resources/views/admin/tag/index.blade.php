@extends('layouts.admin')

@section('content-header')
    <h1>
        标签列表
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h1 class="box-title">标签列表</h1>
        </div>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>创建时间</th>
                        <th>文章</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->created_at->toDateString() }}</td>
                            <td>{{ $tag->posts_count }}</td>
                            <td>
                                <a href="{{ route('admin.tag.edit', ['id' => $tag->id]) }}"
                                   class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box box-footer">
            <div class="pull-right">
                {!! $tags->render() !!}
            </div>
        </div>
    </div>
@endsection