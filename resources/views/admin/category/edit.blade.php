@extends('layouts.admin')

@section('content-header')
    <h1>
        编辑分类
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-info">
                <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="box-header">
                        <he class="box-title">新建分类</he>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">分类名称*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-info">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection