$(document).ready(function () {
    $('.classroom').change(function () {
        let id = $(this).val();
        let url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                id:id
            },
            success: function (data) {
                $('.user').html(data);
            }
        });
    })

})
