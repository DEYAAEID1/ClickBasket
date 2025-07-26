
$(document).ready(function() {
    $('#createproductForm').submit(function(e) {
        e.preventDefault(); 

        var formData = new FormData(this); // جمع بيانات النموذج

        $.ajax({
            url:'/admin/product/create' , 
            method: 'POST',
            data:formData,
             processData: false,
            contentType: false,
            cache: false, 
            success: function(response) {
                
                $('#createproductModal').modal('hide');

                alert('product created successfully!');

               
                location.reload(); 
            },
            error: function(xhr) {
               
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});
