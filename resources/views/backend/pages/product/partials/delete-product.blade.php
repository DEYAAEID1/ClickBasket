<!-- Delete product Modal -->
<div class="modal fade" id="deleteModalproduct" tabindex="-1" aria-labelledby="deleteModalproductLabel"  role="dialog" >
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalproductLabel">Delete product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
                <p><strong id="product-name-to-delete"></strong></p>  <!-- Show product name for confirmation -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="delete-product-btn" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
