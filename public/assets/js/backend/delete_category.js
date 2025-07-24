$(document).on('click', '#btn_delete_category', function() {
    var categoryId = $(this).data('category-id'); // الحصول على الـ ID
    var categoryName = $(this).closest('tr').find('td').eq(1).text(); // الحصول على اسم الفئة من الجدول
    
    // تعبئة اسم الفئة في الـ Modal للتأكيد
    $('#category-name-to-delete').text(categoryName);
    
    // حفظ الـ ID في الـ Modal
    $('#delete-category-btn').data('category-id', categoryId);

    // فتح الـ Modal
    $('#deleteModalCategory').modal('show');
});

// عند الضغط على زر الحذف داخل الـ Modal
$('#delete-category-btn').click(function() {
    var categoryId = $(this).data('category-id'); // الحصول على الـ ID من الـ Modal

    // إرسال طلب AJAX لحذف الفئة
    $.ajax({
        url: '/categories/' + categoryId, // المسار الذي سيقوم بحذف الفئة
        method: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content') // إرسال التوكن لحماية CSRF
        },
        success: function(response) {
            // غلق الـ Modal بعد الحذف
            $('#deleteModalCategory').modal('hide');
            
            // إزالة الصف من الجدول
            $('tr').filter('[data-id="'+ categoryId +'"]').remove();

            alert('Category deleted successfully');
        },
        error: function(error) {
            alert('Error: ' + error.responseText);
        }
    });
});
