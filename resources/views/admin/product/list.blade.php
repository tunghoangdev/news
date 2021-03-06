@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="widget">
                <div class="widget-header bordered-bottom bordered-blue">
                    <span class="widget-caption text-uppercase">Danh mục sản phẩm</span>
                    <div class="widget-buttons">
                        <a href="#" data-toggle="maximize">
                            <i class="fa fa-expand"></i>
                        </a>
                        <a href="#" data-toggle="collapse">
                            <i class="fa fa-minus"></i>
                        </a>
                        <a href="#" data-toggle="dispose">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="table-toolbar">
                        <a id="editabledatatable_new" href="{!! URL::route('admin.product.getAdd') !!}" class="btn btn-success">
                            Thêm mới
                        </a>
                    </div>
                    <div id="editabledatatable_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <div class="DTTT btn-group">
                            <a class="btn btn-default DTTT_button_print" id="ToolTables_editabledatatable_1" title="View print view" tabindex="0" aria-controls="editabledatatable">
                                <span><i class="fa fa-print"></i> In</span>
                            </a>
                        </div>
                        <div id="editabledatatable_filter" class="dataTables_filter">
                            <label><input class="form-control" placeholder="Tìm kiếm..." aria-controls="editabledatatable" type="search"></label>
                        </div>
                        <div class="dataTables_length" id="editabledatatable_length">
                            <label>
                                <select name="editabledatatable_length" aria-controls="editabledatatable" class="form-control input-sm">
                                    <option value="5">5</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="100">100</option>
                                    <option value="-1">All</option>
                                </select>
                            </label>
                        </div>
                        <table class="table table-striped table-hover table-bordered dataTable no-footer" id="editabledatatable" role="grid" aria-describedby="editabledatatable_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="editabledatatable"  aria-sort="ascending" aria-label=" Hình sản phẩm: activate to sort column descending">
                                    Hình sản phẩm
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="editabledatatable"  aria-sort="ascending" aria-label=" Tên sản phẩm: activate to sort column descending">
                                    Tên sản phẩm
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="editabledatatable"  aria-sort="ascending" aria-label=" Tên sản phẩm: activate to sort column descending">
                                    Giá sản phẩm
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="editabledatatable"  aria-label="Danh m?c cha: activate to sort column ascending">
                                    Danh mục
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="editabledatatable"  aria-label="Points : activate to sort column ascending">
                                    Ngày tạo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="editabledatatable" aria-label="Notes : activate to sort column ascending">
                                    Trạng thái
                                </th>
                                <th class="sorting_disabled"  aria-label="">

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $item)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                    <img width="100" src="{!! url('resources/upload').'/'.$item->images !!}">
                                    </td>
                                    <td class="sorting_1">{!! $item->name !!}</td>
                                    <td class="sorting_1">{!! number_format($item->price,0,',','.').' VNĐ' !!}</td>
                                    <td>
                                     @if($item->catid > 0)
                                        <?php $cat = DB::table('categories')->where('id',$item->catid)->first() ?>
                                        {!! $cat->name !!}
                                    @endif
                                    </td>
                                    <td>
                                        {!! Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() !!}
                                    </td>
                                    <td class="text-center">
                                        @if($item->status == 0)
                                            <label>
                                                <input class="checkbox-slider slider-icon colored-blue" type="checkbox">
                                                <span class="text"></span>
                                            </label>
                                        @else
                                            <label>
                                                <input class="checkbox-slider slider-icon colored-blue" checked="checked" type="checkbox">
                                                <span class="text"></span>
                                            </label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{!! URL::route('admin.product.getEdit',$item->id) !!}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                        <a onclick="return config_action('Bạn có chắc chắn xóa?');" href="{!! URL::route('admin.product.getDelete',$item->id) !!}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row DTTTFooter">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="editabledatatable_info" role="status" aria-live="polite">Đang xem 5/10</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_bootstrap" id="editabledatatable_paginate">
                                    <ul class="pagination">
                                        <li class="prev disabled"><a href="#">Prev</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li class="next"><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
