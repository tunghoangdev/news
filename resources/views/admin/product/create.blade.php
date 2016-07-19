@extends('admin.master')
@section('content')
    <div class="row">
        <form id="fileupload" action="{!! route('admin.product.getAdd') !!}" method="post" enctype="multipart/form-data" role="form">
            <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
        <div class="col-lg-12 col-sm-12 col-xs-12">
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
                                <label for="price">Hình ảnh chi tiết</label>
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                                    <button type="submit" class="btn btn-primary start">
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                    <button type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                    <input type="checkbox" class="toggle">
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->
                            <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
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
                <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->

            </div>
        </form>
    </div>
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
@endsection
