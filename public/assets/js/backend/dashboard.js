$(document).ready(function() {
    // عندما يتم النقر على رابط "Manage Categories"
    $('#manageCategoriesLink').click(function() {
        loadContent('categories');  // تحميل جدول الفئات
    });

    // دالة لتحميل المحتوى الديناميكي بناءً على نوع الجدول
    function loadContent(contentType) {
        // إخفاء المحتوى الحالي في الـ main
        $('#wlc-page-container').fadeOut(function() {
            // استدعاء AJAX لتحميل المحتوى المناسب بناءً على نوع المحتوى
            $.ajax({
                url: '/admin/' + contentType + '/content',  // المسار لتحميل البيانات
                method: 'GET',
                success: function(response) {
                    // تحديث محتوى الـ #dynamic-content
                    $('#dynamic-content').html(response).fadeIn();
                    
                    // تأكد من أنه إذا كان المحتوى يحتوي على DataTable، سيتم تفعيله
                    if (contentType === 'categories') {
                        if ($.fn.DataTable) {
                            $('#dynamic-content table').DataTable({
                                // إضافة خيارات مخصصة إذا كنت بحاجة إلى ذلك
                                paging: true,
                                searching: true,
                                ordering: true,
                                responsive: true
                            });
                        }
                    }
                },
                error: function() {
                    alert('حدث خطأ أثناء تحميل المحتوى.');
                }
            });
        });
    }
});
