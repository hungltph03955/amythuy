@extends('layouts.admin.master')

@section('content')
    <section class="content-header content-child">
        <h1>Quản trị tổng</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Đơn hàng mới
                                nhât</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Sản phẩm mới thêm</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Tin tức , bài viết mới
                                thêm</a></li>
                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <input type="hidden" id="countArrayOrderNew" value="{{ $countArrayOrderNew }}">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <b>Danh sách đơn hàng mới nhất:</b>
                            @include('element.admin.orderTen')
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <b>Danh sách sản phẩm mới nhất:</b>
                            @include('element.admin.productTen')
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <b>Danh sách bài viết, tin tức mới nhất:</b>
                            @include('element.admin.newTen')
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <script>
        $(document).ready(function () {
            var checkCountOrderStatus = $('#countArrayOrderNew').val();
            if (checkCountOrderStatus > 0) {
                bootbox.alert("Có Đơn hàng mới hãy kiểm tra đơn hàng");
            }
        });
    </script>
@endsection
