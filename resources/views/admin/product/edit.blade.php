@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-sm-8 col-xs-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption">Chỉnh sửa danh mục</span>
                </div>
                <div class="widget-body">
                    @include('admin.alert.notify')
                    <div>
                        <form action="" method="post" role="form">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="cat_name">Tên danh mục</label>
                                <input class="form-control" id="cat_name"  name="cat_name" value="{!! old('cat_name',isset($data)?$data->name : null) !!}" placeholder="Nhập tên thể loại" type="text">
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label for="alias">Alias</label>--}}
                            {{--<input class="form-control" id="alias" name="alias" placeholder="Nhập Alias" type="text">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="alias">Sắp xếp</label>
                                <input class="form-control" id="order" name="order" value="{!! old('order',isset($data)?$data->order : null) !!}" placeholder="Số thứ tự" type="text">
                            </div>
                            <div class="form-group">
                                <label for="parentid">Danh mục cha</label>
                                <select name="parentid" id="parentid" class="form-control">
                                    <option value="0">--Chọn danh mục cha--</option>
                                    {!! cat_parent($parent,0,'',$data->parent_id) !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Keywords</label>
                                <input class="form-control" id="keyword" name="keyword" value="{!! old('keyword',isset($data)?$data->keywords : null) !!}" placeholder="Nhập Keywords" type="text">
                            </div>
                            <div class="form-group">
                                <label for="keyword">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Nhập Description">{!! old('description',isset($data)?$data->description : null) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {!! old('description',isset($data)&& $data->status ? 'checked="checked"' : null) !!}  name="status" value="1" id="status">
                                        <span class="text">Kích hoạt</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-blue">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
