// عند الضغط على زر "Edit"
$('#btn_edit_category').click(function() {
    var categoryId = $(this).data('category-id'); 
    $.ajax({
        url: '/categories/' + categoryId + '/edit',  
        method: 'GET',
        success: function(response) {
            $('#editModalCategory').find('#editCategoryForm').html(response);
            $('#editModalCategory').modal('show');
        }
    });
});

$('#editCategoryForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: '/categories/update',  
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            alert('Category updated successfully');
            $('#editModalCategory').modal('hide');
        }
    });
});
