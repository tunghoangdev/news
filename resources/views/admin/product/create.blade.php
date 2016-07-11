@extends('admin.master')
@section('content')
   <div class="row">
      <div class="col-lg-8 col-sm-8 col-xs-12">
         <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
               <span class="widget-caption">Thêm mới sản phẫm</span>
            </div>
            <div class="widget-body">
               <div>
                  <form role="form">
                     <div class="form-group">
                        <label for="catname">Tên sản phẩm</label>
                        <input class="form-control" id="catname"  name="catname" placeholder="Nhập tên sản phẩm" type="text">
                     </div>
                     <div class="form-group">
                        <label for="alias">Alias</label>
                        <input class="form-control" id="alias" name="alias" placeholder="Nhập Alias" type="text">
                     </div>
                     <div class="form-group">
                        <label for="price">Giá sản phẩm</label>
                        <input class="form-control" id="price" name="price" placeholder="Giá sản phẩm" type="text">
                     </div>
                     <div class="form-group">
                        <label for="intro">Mô tả ngắn</label>
                        <textarea class="form-control" id="intro" name="intro" placeholder="Nhập mô tả ngắn" type="text"></textarea>
                     </div>
                      <div class="form-group">
                        <label for="content">Chi tiết sản phẩm</label>
                        <textarea class="form-control" id="content" name="content" placeholder="Nhập mô tả ngắn" type="text"></textarea>
                     </div>

                     <div class="form-group">
                        <label for="procat">Danh mục sản phẩm</label>
                        <select name="procat" id="procat" class="form-control">
                           <option value="">--Chọn danh mục cha--</option>
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
                              <input type="checkbox">
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
