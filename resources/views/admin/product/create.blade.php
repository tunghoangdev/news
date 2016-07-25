@extends('admin.master')
@section('content')
    <div class="row">
        <form  action="{!! route('admin.product.getAdd') !!}" method="post" enctype="multipart/form-data" role="form">
        <div class="col-lg-8 col-sm-8 col-xs-8">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption">Thêm mới Sản phầm</span>
                </div>
                <div class="widget-body">
                    @include('admin.alert.notify')
                    <div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="parentid">Danh mục</label>
                                <select name="catid" id="catid" class="form-control">
                                    <option value="">--Chọn danh mục--</option>
                                    @if(count($cat) > 0)
                                        {!! cat_parent($cat) !!}
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" id="name"  name="name" value="{!! old('name') !!}" placeholder="Nhập tên sản phẩm" type="text">
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label for="alias">Alias</label>--}}
                            {{--<input class="form-control" id="alias" name="alias" placeholder="Nhập Alias" type="text">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input class="form-control" id="price" name="price" value="{!! old('price') !!}" placeholder="Giá sản phẩm" type="text">
                            </div>
                            <div class="form-group">
                                <label for="intro">Mô tả ngắn</label>
                                <textarea class="form-control" id="txtintro" name="txtintro" placeholder="Mô tả ngắn">{!! old('txtintro') !!}</textarea>
                                <script>ckeditor('txtintro');</script>
                            </div>
                             <div class="form-group">
                                <label for="intro">Chi tiết sản phẩm</label>
                                <textarea class="form-control" id="txtcontent" name="txtcontent" placeholder="Chi tiết sản phẩm">{!! old('txtcontent') !!}</textarea>
                                 <script>ckeditor('txtcontent');</script>
                            </div>
                            <div class="form-group">
                                <label for="price">Hình ảnh</label>
                                <input class="form-control" id="imager" name="imager" value="{!! old('imager') !!}" type="file">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keywords</label>
                                <input class="form-control" id="keyword" name="keyword" value="{!! old('keyword') !!}" placeholder="Nhập Keywords" type="text">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Description</label>
                                <input class="form-control" id="description" name="description" value="{!! old('description') !!}" placeholder="Nhập Description" type="text">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked" name="status" value="1" id="status">
                                        <span class="text">Kích hoạt</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-blue">Thêm mới</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <label for="imgDetail">Hình ảnh chi tiết</label>
            {{--@for($i = 1;$i<=10; $i++)--}}
            <div class="form-group">
                <input type="file" name="imgDetail[]" id="imgDetail" multiple/>
            </div>
            {{--@endfor--}}
        </div>
        </form>
    </div>
@endsection
