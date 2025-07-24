// عند الضغط على زر "Edit"
$('#btn_edit_category').click(function() {
    var categoryId = $(this).data('category-id'); // الحصول على الـ ID
    // استعراض الـ Modal وإحضار البيانات الخاصة بالفئة
    $.ajax({
        url: '/categories/' + categoryId + '/edit',  // مسار لتحميل بيانات الفئة
        method: 'GET',
        success: function(response) {
            // استعراض البيانات في الـ Modal (مثل تعبئة النموذج)
            $('#editModalCategory').find('#editCategoryForm').html(response);
            // فتح الـ Modal
            $('#editModalCategory').modal('show');
        }
    });
});

// عند الضغط على زر "Save Changes" داخل Modal
$('#editCategoryForm').submit(function(e) {
    e.preventDefault();
    // إرسال البيانات المعدلة إلى الخادم
    $.ajax({
        url: '/categories/update',  // المسار لحفظ التعديلات
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            alert('Category updated successfully');
            // غلق الـ Modal بعد التحديث
            $('#editModalCategory').modal('hide');
        }
    });
});
