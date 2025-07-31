// عند الضغط على زر "Edit"
$('#btn_edit_subcategory').click(function() {
    var subcategoryId = $(this).data('subcategory-id'); 
    $.ajax({
        url: '/subcategory/' + subcategoryId + '/edit',  
        method: 'GET',
        success: function(response) {
            $('#editModalCategory').find('#editCategoryForm').html(response);
            $('#editModalCategory').modal('show');
        }
    });
});

$('#editSubcategoryForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: '/subcategory/update',  
        method: 'PUT',
        data: $(this).serialize(),
        success: function(response) {
            alert('Category updated successfully');
            $('#editModalCategory').modal('hide');
        }
    });
});
