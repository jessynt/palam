@extends('layouts.admin')

@section('content-header')
    <h1>
        分类列表
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h1 class="box-title">分类列表</h1>
            <div class="box-tools">
                <form action="{{ route('admin.category.index') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="keyword" class="form-control pull-right" placeholder="Search" value="{{ request('keyword') }}">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->toDateString() }}</td>
                            <td>{{ $category->posts_count }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
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
                {!! $categories->render() !!}
            </div>
        </div>
    </div>
@endsection