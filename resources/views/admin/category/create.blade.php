@extends('admin.master')
@section('content')
   <div class="row">
      <div class="col-lg-8 col-sm-8 col-xs-12">
         <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
               <span class="widget-caption">Thêm mới danh mục</span>
            </div>
            <div class="widget-body">
                @include('admin.alert.notify')
               <div>
                  <form action="{!! route('admin.category.getAdd') !!}" method="post" role="form">
                     <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                     <div class="form-group">
                        <label for="catname">Tên danh mục</label>
                        <input class="form-control" id="catname"  name="catname" value="" placeholder="Nhập tên thể loại" type="text">
                     </div>
                     {{--<div class="form-group">--}}
                        {{--<label for="alias">Alias</label>--}}
                        {{--<input class="form-control" id="alias" name="alias" placeholder="Nhập Alias" type="text">--}}
                     {{--</div>--}}
                     <div class="form-group">
                        <label for="alias">Sắp xếp</label>
                        <input class="form-control" id="order" name="order" placeholder="Số thứ tự" type="text">
                     </div>
                     <div class="form-group">
                        <label for="parentid">Danh mục cha</label>
                        <select name="parentid" id="parentid" class="form-control">
                           <option value="0">--Chọn danh mục cha--</option>
                           @if(count($parent) > 0)
                            {!! cat_parent($parent) !!}
                              @endif
                        </select>
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
