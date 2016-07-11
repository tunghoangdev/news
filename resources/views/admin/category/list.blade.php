@extends('admin.master')
@section('content')
    <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="well with-header with-footer">
                    <div class="header bordered-pink">
                        Danh sách thể loại
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>
                                 Tên thể loại
                            </th>
                            <th class="hidden-xs">
                                 Contact
                            </th>
                            <th>
                                <i class="fa fa-shopping-cart"></i> Total
                            </th>
                            <th>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <a href="#">RedBull</a>
                            </td>
                            <td class="hidden-xs">
                                Mike Nilson
                            </td>
                            <td>
                                2560.60$
                            </td>
                            <td>
                                <a href="#" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Google</a>
                            </td>
                            <td class="hidden-xs">
                                Adam Larson
                            </td>
                            <td>
                                560.60$
                            </td>
                            <td>
                                <a href="#" class="btn btn-default btn-xs black"><i class="fa fa-trash-o"></i> Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Apple</a>
                            </td>
                            <td class="hidden-xs">
                                Daniel Kim
                            </td>
                            <td>
                                3460.60$
                            </td>
                            <td>
                                <a href="#" class="btn btn-default btn-xs purple"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Microsoft</a>
                            </td>
                            <td class="hidden-xs">
                                Nick
                            </td>
                            <td>
                                2560.60$
                            </td>
                            <td>
                                <a href="#" class="btn btn-default btn-xs blue"><i class="fa fa-share"></i> Share</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="footer">
                        <code>&lt; th class="hidden-xs" &gt;</code>
                    </div>
                </div>
            </div>
        </div>
@endsection
