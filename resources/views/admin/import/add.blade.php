@extends('layouts.admin')

@section('title')
<title>
    Thêm hàng hóa
</title>
@endsection

@section('css')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<style>
/* arlert validate form */
.alert-input_field {
  padding: 0px 14px;
  background-color: #dc3545;
  color: white;
  border-radius: 5px;
  margin-top: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 14px;
}

.closebtn-input_field {
  margin-left: 15px;
  color: white;
  font-weight: 400;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn-input_field:hover {
  color: black;
}
</style>
@endsection

@section('content')
<form action="" method="POST">
    @csrf
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="h3 mb-2 text-gray-800">Chi tiết hóa đơn </h3>
            </div>
            <div class="card-body">
                <h4>Người nhập: {{ auth()->guard('admin')->check() ? auth()->guard('admin')->user()->name : '' }}</h4>
                <input type="hidden" name="id_staff" value="{{ auth()->guard('admin')->check() ? auth()->guard('admin')->user()->id : '' }}">

                {{-- <h4>
                    <div class="col-sm-6 mb-3 mb-sm-0" style="padding-left: 0px;">
                        <label> Tên xưởng cung cấp </label>
                        <select class="form-control" name="id_supplier">
                            @foreach($ncc as $product)
                                <option value="">hehe</option>
                            @endforeach
                        </select>
                    </div>
                </h4> --}}
                <h4 class="totalMoney">Tổng tiền: </h4>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="float: left">Danh sách hàng nhập</h6>
                <button type="button" class="btn btn-primary add-item" style="float: right"> Thêm</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        {{--  --}}
                        @include('admin.import.components.product_model')
                        {{--  --}}
                    </table>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-md-3">
                <a style="float: left" href="/admin/import/delete/"
                   class="btn btn-primary btn-user btn-block col-3">Trở về</a>
                <button type="submit" class="btn btn-primary btn-user btn-block col-3" style="float: right;">Lưu
                </button>

            </div>
        </div>

    </div>
</form>
@endsection

@section('script')
    <script>
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // function removeRow(id, url) {
        //     if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        //         $.ajax({
        //             type: 'DELETE',
        //             datatype: 'JSON',
        //             data: {id},
        //             url: url,
        //             success: function (result) {
        //                 if (result.error === false) {
        //                     alert(result.message);
        //                     location.reload();
        //                 } else {
        //                     alert('Xóa lỗi vui lòng thử lại');
        //                 }
        //             }
        //         })
        //     }
        // }
    </script>

    <script>
        var productModelItem = `
        <tr class = "item">
        <td> <button type="button" class="btn btn-danger remove">&times;</button> </td>
        <td>
            <input required type="text" id="txt_ide" list="ide" name="productModel[]" data-product-id=""  autocomplete="off" class="form-control form-control-user"/>
            <datalist id="ide">
                @foreach($products as $product)
                <option value="{{ $product->productName . ' (' . $product->colorName . ' - ' . $product->sizeName . ')' }}" data-product-attr-id="{{ $product->proattr_id }}" data-product-id="{{ $product->productId }}" data-color="{{ $product->color_id }}" data-size="{{ $product->size_id }}" ></option>
                {{--  <option value="{{ $product->productName . ' (' . $product->colorName . ' - ' . $product->sizeName . ')' }}" data-product-attr-id="{{ $product->proattr_id }}" data-product-id="{{ $product->productId }}" data-color="{{ $product->colorName }}" data-size="{{ $product->sizeName }}" ></option> --}}
                @endforeach
            </datalist>
            <input type="hidden" value="" id="productid" name="productId[]" />
        </td>
        <td>
            <select id ="pro_color" class="form-control" name="size[]" >
                <option value="" selected>Trống</option>
                @foreach($attributesSize as $size)
                    <option value="{{ $size->id }}">{{ $size->value }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select id ="pro_size" class="form-control" name="color[]" >
                <option value="" selected>Trống</option>
                @foreach($attributesColor as $color)
                    <option value="{{ $color->id }}">{{ $color->value }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input required type="number" min="0" name="quantity[]"
                class="form-control form-control-user quantity"
                id="exampleInputPassword">
        </td>
        <td>
            <input required type="number" min="0" name="price[]" value="100000" step="10000"
                class="form-control form-control-user price" id = "productModelPrice"
                id="exampleInputPassword">
        </td>
        </tr>
        `;
        $('.add-item').on('click', function () {
            $('.product_model').append(productModelItem);
        });

        $('.product_model').on('click', '.remove', function () {
            if (confirm('Xóa mẫu mã này?')) {
                $(this).parents('.item').remove();
            }
        });

    </script>

    <script>

        var errorHtml = null;
        function productCheck(){
            var inputThis = $(this);

            $.each(inputThis, function(index, value) {
                
                var productName = $(value).val();

                var selectedOption = $(value).parents('td').find('#ide > option[value="' + productName + '"]');
                var idColor = $(selectedOption).data('color');
                var idSize = $(selectedOption).data('size');
                var productId = $(selectedOption).data('product-id');
                var proAttrId = $(selectedOption).data('product-attr-id');

                if(productId && productName.trim() !== ''){

                    $(value).attr('data-product-id', productId);
                    $(value).parents('td').find('#productid').val(productId);

                    $(value).parents('tr.item').find('#pro_color > option, #pro_size > option').prop('selected', false)
                    .filter('[value="' + idColor + '"], [value="' + idSize + '"]').prop('selected', true);
                
                    if (errorHtml !== null) {
                        $(this).next('.alert-input_field').remove();
                        errorHtml = null;
                    }
                } else {
                    
                    if(errorHtml === null){
                        var alertHtml = `<div class="alert-input_field">
                                Giá trị không tồn tại * 
                                <span class="closebtn-input_field";"></span> 
                            </div>`;
                        errorHtml = $(this).after(alertHtml);
                    }
                    $(value).parents('td').find('#productid').val(null);

                    $(value).parents('tr.item').find('#pro_color > option, #pro_size > option').prop('selected', false);
                    
                }
                
            });
        }

        $(function() {
            /*-------------------
            Quantity type input
            --------------------- */
            $(document).on('input', '#txt_ide.form-control-user', productCheck);
        });
    </script>
@endsection