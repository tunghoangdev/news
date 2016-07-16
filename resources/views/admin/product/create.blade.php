@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-sm-8 col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption">Thêm mới Sản phầm</span>
                </div>
                <div class="widget-body">
                    @include('admin.alert.notify')
                    <div>
                        <form action="{!! route('admin.product.getAdd') !!}" method="post" role="form">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="catname">Tên sản phẩm</label>
                                <input class="form-control" id="name"  name="name" value="" placeholder="Nhập tên sản phẩm" type="text">
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label for="alias">Alias</label>--}}
                            {{--<input class="form-control" id="alias" name="alias" placeholder="Nhập Alias" type="text">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input class="form-control" id="price" name="price" placeholder="Giá sản phẩm" type="text">
                            </div>
                            <div class="form-group">
                                <label for="intro">Mô tả ngắn</label>
                                <textarea class="form-control" id="intro" name="intro" placeholder="Mô tả ngắn"></textarea>
                                <script>ckeditor('intro');</script>
                            </div>
                             <div class="form-group">
                                <label for="intro">Chi tiết sản phẩm</label>
                                <textarea class="form-control" id="content" name="content" placeholder="Chi tiết sản phẩm"></textarea>
                                 <script>ckeditor('content');</script>
                            </div>
                            <div class="form-group">
                                <label for="parentid">Danh mục</label>
                                <select name="catid" id="catid" class="form-control">
                                    <option value="0">--Chọn danh mục--</option>
                                    @if(count($cat) > 0)
                                        {!! cat_parent($cat) !!}
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Hình ảnh</label>
                                <input class="form-control" id="imager" name="imager" type="file">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keywords</label>
                                <input class="form-control" id="keyword" name="keyword" placeholder="Nhập Keywords" type="text">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Description</label>
                                <input class="form-control" id="description" name="description" placeholder="Nhập Description" type="text">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
