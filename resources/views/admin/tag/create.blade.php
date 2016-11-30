@extends('layouts.admin')

@section('content-header')
    <h1>
        创建标签
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-info">
                <form action="{{ route('admin.tag.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-header">
                        <he class="box-title">新建标签</he>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">标签名称*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-info">立即创建</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection