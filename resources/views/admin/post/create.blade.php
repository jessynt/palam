@extends('layouts.admin')

@section('content-header')
    <h1>
        写文章
    </h1>
@endsection
@section('content')
    <div class="row">
        <form action="{{ route('admin.post.store') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-9">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">创建新文章</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="control-label">文章标题*</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="slug" class="control-label">slug*</label>
                            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}">
                        </div>
                        <div class="form-group">
                            <label for="article-editor" class="control-label">文章正文*</label>
                            <textarea name="body" id="article-editor" style="display: none">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            <button type="reset" class="btn btn-default">取消</button>
                            <button type="submit" class="btn btn-info">发布</button>
                        </div>
                        <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> 重置</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-title">分类</div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            @foreach($categories as $category)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="category_id"
                                               value="{{ $category->id }}">{{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="box-title">标签</div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <select id="post-tags" name="tags_id[]" class="form-control" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    </div>
    </div>
    </form>
    </div>
@endsection
@section('after-styles-end')
    <link rel="stylesheet" href="{{asset('/css/admin/editor.css')}}">
    <link href="//cdn.bootcss.com/select2/4.0.3/css/select2.min.css" rel="stylesheet">
@endsection
@section('after-scripts-end')
    <script src="{{asset('/js/admin/editor.js')}}"></script>
    <script src="//cdn.bootcss.com/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#post-tags').select2({
                tags: true
            });
        });
    </script>
@endsection