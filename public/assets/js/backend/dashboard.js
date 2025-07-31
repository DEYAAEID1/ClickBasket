$(document).ready(function () {
    // عند النقر على رابط "Manage Categories"
    $('#manageCategoriesLink').click(function () {
        loadContent('categories');
    });

    // عند النقر على رابط "Product Management"
    $('#productmanagementlink').click(function () {
        loadContent('product');
    });

    // زر تحميل الفئات الفرعية
    $(document).on('click', '.btn_subcategory', function () {
        var categoryId = $(this).data('category-id');

        if (categoryId !== undefined && categoryId !== null && categoryId !== '') {
            loadSubcategoryPage(categoryId);
        } else {
            alert("خطأ: لم يتم تحديد categoryId بشكل صحيح.");
        }
    });

    // دالة تحميل المحتوى
    function loadContent(contentType, categoryId = null) {
        var url = '/admin/' + contentType + '/content';

        if (contentType === 'subcategories') {
            if (categoryId !== undefined && categoryId !== null && categoryId !== '') {
                url += '/' + categoryId;
            } else {
                alert("خطأ: لم يتم تحديد categoryId بشكل صحيح.");
                return;
            }
        }

        $('#wlc-page-container').fadeOut(function () {
            // استدعاء AJAX لتحميل المحتوى
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    $('#dynamic-content').html(response).fadeIn();

                    // تفعيل DataTable بناءً على نوع المحتوى
                    if (contentType === 'categories') {
                        activateDataTable();
                    }
                    if (contentType === 'product') {
                        activateDataTable();
                    }
                    if (contentType === 'subcategories') {
                        activateDataTable();
                    }
                },
                error: function (xhr, status, error) {
                    alert('حدث خطأ أثناء تحميل المحتوى: \n' +
                        'Status: ' + status + '\n' +
                        'Error: ' + error + '\n' +
                        'Response: ' + xhr.responseText);
                }
            });
        });
    }

    // دالة منفصلة لتفعيل DataTable
    function activateDataTable() {
        if ($.fn.DataTable) {
            $('#dynamic-content table').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        }
    }
});
