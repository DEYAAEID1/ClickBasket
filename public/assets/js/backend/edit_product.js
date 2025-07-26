$('#btn_edit_product').click(function() {
    var productId = $(this).data('product-id'); 
    
    $.ajax({
        url: '/product/' + productId + '/edit',  
        method: 'GET',
        success: function(response) {
            console.log(response);
            $('#editModalproduct').find('#editproductForm #name ').val(response.name);
            $('#editModalproduct').find('#editproductForm #description').val(response.description);
            $('#editModalproduct').find('#editproductForm #price').val(response.price);
            $('#editModalproduct').modal('show');
        }
    });
});

// عند الضغط على زر "Save Changes" داخل Modal
$('#editproductForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: '/categories/update',  // المسار لحفظ التعديلات
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            alert('product updated successfully');
            // غلق الـ Modal بعد التحديث
            $('#editModalproduc').modal('hide');
        }
    });
});
