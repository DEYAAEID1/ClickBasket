$(document).ready(function() {
    $('#createSubcategoryForm').submit(function(e) {
        e.preventDefault(); 

       var formData = new FormData(this); 

        $.ajax({
            url: '/admin/subcategories/content',
            method: 'POST',
            data:formData,
             processData: false,
            contentType: false,
            cache: false, 
            success: function(response) {
           
                $('#createSubcategoryModal').modal('hide');

                alert('Category created successfully!');

                 $('#SubcategoryDataTable ').DataTable().ajax.reload();
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});
