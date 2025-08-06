$(document).ready(function () {

    $(document).on('click', '.btn_edit_subcategory', function () {

        var subcategoryId = $(this).data('subcategory-id');
        $.ajax({
            url: '/subcategory/' + subcategoryId + '/edit',
            method: 'GET',
            success: function (response) {
                $('#editModalSubcategory #category_id').val(response.category_id);
                $('#editModalSubcategory #name').val(response.name);
                $('#editModalSubcategory #description').val(response.description);
                if (response.image) {
                    $('#editCategoryModal #subcategory-image').attr('src', response.image).show();
                } else {
                    $('#editCategoryModal #subcategory-image').hide();
                }
                
                    $('#editModalSubcategory').modal('show');
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
    });

    $('#editSubcategoryForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/subcategory/update',
            method: 'PUT',
            data: $(this).serialize(),
            success: function (response) {
                alert('Category updated successfully');
                $('#editModalCategory').modal('hide');
            }
        });
    });
});
