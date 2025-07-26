$(document).on('click', '#btn_delete_product', function () {
    var productId = $(this).data('product-id');
    var productName = $(this).closest('tr').find('td').eq(1).text(); // الحصول على اسم الفئة من الجدول

    // تعبئة اسم الفئة في الـ Modal للتأكيد
    $('#product-name-to-delete').text(productName);

    // حفظ الـ ID في الـ Modal
    $('#delete-product-btn').data('product-id', productId);

    // فتح الـ Modal
    var myModal = new bootstrap.Modal(document.getElementById('deleteModalproduct'));
    myModal.show();

});


// عند الضغط على زر الحذف داخل الـ Modal
$('#delete-product-btn').click(function () {
    var productId = $(this).data('product-id');

    // إرسال طلب AJAX لحذف الفئة
    $.ajax({
        url: '/product/' + productId, // المسار الذي سيقوم بحذف الفئة
        method: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content') // إرسال التوكن لحماية CSRF
        },
        success: function (response) {
            // غلق الـ Modal بعد الحذف
            $('#deleteModalproduct').modal('hide');
            $('.modal-backdrop').remove();
            // إزالة الصف من الجدول
            $('tr[data-product-id="' + productId + '"]').remove();
            $('#product-table').DataTable().ajax.reload();
            alert(response.message);
        },
        error: function (error) {
            alert('Error: ' + error.responseText);
        }
    });
});
