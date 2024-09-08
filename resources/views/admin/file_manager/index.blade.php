@extends('layouts.admin')

@section('title')
<title>
    Quản lí hình ảnh
</title>
@endsection

@section('title_header-page')
Quản lí hình ảnh
@endsection

@section('title_key_header-page')
view
@endsection

@section('content')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <iframe src="{{ url('laravel-filemanager') }}" style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
