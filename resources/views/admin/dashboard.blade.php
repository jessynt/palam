@extends('layouts.admin')

@section('content-header')
    <h1>
        Dashboard
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-book"></i>
                    <h3 class="box-title">最近文章</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="articles-list article-list-in-box">
                        @if (count($latestPosts))
                            @foreach($latestPosts as $post)
                            <li class="item">
                                <div class="article-img">
                                    <img src="/images/avatars/user_large.jpg" alt="Product Image">
                                </div>
                                <div class="article-info">
                                    <a href="javascript:void(0)" class="article-title">{{ $post->title }}</a>
                                    <span class="article-description">{{ $post->title }}</span>
                                </div>
                            </li>
                            @endforeach
                        @else
                            <p class="text-muted">数据库中没有任何记录</p>
                        @endif
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ route('admin.post.index') }}" class="uppercase">浏览所有文章</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
@endsection