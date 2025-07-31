function loadSubcategoryPage(subcategoryId) {
    $.ajax({
        url: '/admin/' + '/subcategory/' + '/content',
        method: 'GET',
        success: function (response) {
            // تحميل المحتوى داخل عنصر معين، مثل #editSubcategoryContent
            $('#SubcategoryContent').html(response);
        },
        error: function (xhr, status, error) {
            // إظهار رسالة تحتوي على تفاصيل الخطأ
            alert('حدث خطأ أثناء تحميل صفحة التعديل: \n' +
                'Status: ' + status + '\n' +
                'Error: ' + error + '\n' +
                'Response: ' + xhr.responseText);
        }
    });
}
