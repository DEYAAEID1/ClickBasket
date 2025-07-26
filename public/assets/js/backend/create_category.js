$(document).ready(function() {
    // عند الضغط على زر "Save changes" في الـ Modal
    $('#createCategoryForm').submit(function(e) {
        e.preventDefault(); 

        var formData = $(this).serialize(); // جمع بيانات النموذج

        // إرسال بيانات الفئة باستخدام AJAX
        $.ajax({
            url: 'admin/categories/content', // المسار الذي سيتم إرسال البيانات إليه
            method: 'POST',
            data: formData,
            success: function(response) {
                // إغلاق الـ Modal بعد النجاح
                $('#createCategoryModal').modal('hide');

                // إظهار رسالة نجاح
                alert('Category created successfully!');

                // يمكنك تحديث DataTable هنا إذا كان لديك
                location.reload(); // أو استخدم AJAX لملء الجدول مرة أخرى
            },
            error: function(xhr) {
                // في حال وجود خطأ، إظهار رسالة الخطأ
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});
