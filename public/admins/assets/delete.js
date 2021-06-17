function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Bạn có chắc muốn xóa?',
        text: "Bạn sẽ không thể khôi phục lại dữ liệu!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.value) {
            $.ajax(
                {
                    type: 'GET',
                    url: urlRequest,
                    success: function (data) {
                        if (data.code == 200) {
                            that.parent().parent().remove();
                            Swal.fire(
                                'Đã xóa!',
                                'Bạn đã xóa thành công',
                                'success'
                            )
                        }
                        else if (data.code == 201)
                        {
                            Swal.fire(
                                'Not Delete!',
                                'Có thầy giáo dang dạy',
                                'error'
                            )
                        }
                    },
                    error: function (data) {

                    }
                });

        }
    })
}

$(function () {
    $(document).on('click', '.action-delete', actionDelete)
});
