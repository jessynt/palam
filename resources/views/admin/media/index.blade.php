@extends('layouts.admin')

@section('content-header')
    <h1>媒体管理</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @foreach(range(1,1) as $i)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <img src="http://oaqyg7sdd.bkt.clouddn.com/image/63284e5a13224d37c624ea2467d1adc2.jpeg?imageView2/1/h/250">
                </div>
            @endforeach
        </div>
    </div>
@endsection