//查看
$('.data-view').on('click', function () {
    $.get('{$requestViewUrl}', { id: $(this).closest('tr').data('key') },
        function (data) {
            $('.modal-body').html(data);
        }
    );
});

//更新
$('.data-update').on('click', function () {
    $.get('{$requestUpdateUrl}', { id: $(this).closest('tr').data('key') },
        function (data) {
            $('.modal-body').html(data);
        }
    );
});

