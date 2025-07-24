<!-- Delete Category Modal -->
<div class="modal fade" id="deleteModalCategory" tabindex="-1" aria-labelledby="deleteModalCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalCategoryLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
                <p><strong id="category-name-to-delete"></strong></p>  <!-- Show category name for confirmation -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="delete-category-btn" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
