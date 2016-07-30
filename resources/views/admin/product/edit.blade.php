@extends('admin.master')
@section('content')
    <div class="row">
        <form name="frmEditProduct" action="" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="col-lg-8 col-sm-8 col-xs-8">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">Thêm mới Sản phầm</span>
                    </div>
                    <div class="widget-body">
                        @include('admin.alert.notify')
                        <div>
                            <div class="form-group">
                                <label for="parentid">Danh mục</label>
                                <select name="catid" id="catid" class="form-control">
                                    <option value="">--Chọn danh mục--</option>
                                    @if(count($parent) > 0)
                                        {!! cat_parent($parent,0,'--',$data->catid) !!}
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" id="name"  name="name" value="{!! old('name',isset($data) ? $data->name: null) !!}" placeholder="Nhập tên sản phẩm" type="text">
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label for="alias">Alias</label>--}}
                            {{--<input class="form-control" id="alias" name="alias" placeholder="Nhập Alias" type="text">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input class="form-control" id="price" name="price" value="{!! old('price',isset($data) ? $data->price: null) !!}" placeholder="Giá sản phẩm" type="text">
                            </div>
                            <div class="form-group">
                                <label for="intro">Mô tả ngắn</label>
                                <textarea class="form-control" id="txtintro" name="txtintro" placeholder="Mô tả ngắn">{!! old('txtintro',isset($data) ? $data->intro: null) !!}</textarea>
                                <script>ckeditor('txtintro');</script>
                            </div>
                            <div class="form-group">
                                <label for="intro">Chi tiết sản phẩm</label>
                                <textarea class="form-control" id="txtcontent" name="txtcontent" placeholder="Chi tiết sản phẩm">{!! old('txtcontent',isset($data) ? $data->content: null) !!}</textarea>
                                <script>ckeditor('txtcontent');</script>
                            </div>
                            <div class="form-group">
                                <label for="price">Hình hiện tại </label>
                                <img width="100" src="{!! asset('resources/upload/'.$data->images) !!}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="price">Hình ảnh</label>
                                <input class="form-control" id="imager" name="imager" value="{!! old('imager') !!}" type="file">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keywords</label>
                                <input class="form-control" id="keyword" name="keyword" value="{!! old('keyword',isset($data) ? $data->keywords: null) !!}" placeholder="Nhập Keywords" type="text">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Description</label>
                                <input class="form-control" id="description" name="description" value="{!! old('description',isset($data) ? $data->descriptions: null) !!}" placeholder="Nhập Description" type="text">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked="checked" name="status" value="1" id="status">
                                        <span class="text">Kích hoạt</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-blue">Cập nhật</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <label for="imgDetail">Hình ảnh chi tiết</label>
                <div class="form-group">
                    <input type="file" name="imgDetail[]" id="imgDetail" multiple/>
                </div>
                <div class="form-group">
                    @foreach($proimg as $key=> $imgfile)
                    <p class="row_img" id="img_{!! $imgfile->id !!}">
                        <img width="200" src="{!! asset('resources/upload/details/'.$imgfile->image) !!}" id="{!! $imgfile->id !!}"  alt="">
                        <a href="javascript:void(0)" type="button" id="del_img" class="btn btn-danger"><i class="fa fa-times"></i></a>
                    </p>
                        @endforeach
                </div>
            </div>
        </form>
        {{--<script>--}}
            {{--var url = '{!! url('delimg/') !!}'--}}
        {{--</script>--}}
    </div>
@endsection
