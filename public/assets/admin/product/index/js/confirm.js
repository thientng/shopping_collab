function actionDelete(event){
    event.preventDefault();// ngăn chặn sự kiện mặc định của thẻ(VD: thẻ a khi ấn vào sẽ load lại trang khi dùng hàm này nó sẽ ngăn chặn load lại trag)

    let urlRequest = $(this).data('url');
    let thisButton = $(this);
    
    Swal.fire({
    title: "Bạn có chắc chắn xóa không?",
    text: "Hành động này không thể khôi phục!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý, xóa !",
    cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type : 'GET',
                url : urlRequest,
                success : function(data){
                    if(data.code == 200) {
                        thisButton.parent().parent().remove();
                    }
                },
                error : function (data){
                    return 'Lỗi rồi';
                },
            });
            Swal.fire({
            title: "Đã xóa!",
            text: "Sản phẩm đã được xóa thành công.",
            icon: "success",
            confirmButtonText: "Xong"
            });
            
        }
    });
}

$(function(){
    $(document).on('click','.action_delete',actionDelete);
});