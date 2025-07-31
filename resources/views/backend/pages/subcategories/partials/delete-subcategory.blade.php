<!-- ================= Delete Subcategory Modal ================= -->
<div class="modal fade" id="deleteModalSubcategory" tabindex="-1" aria-labelledby="deleteModalSubcategoryLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <!-- ================= Modal Header ================= -->
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="deleteModalSubcategoryLabel">Delete Subcategory</h5>
                <!-- Close Button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- ================= Modal Body ================= -->
            <div class="modal-body">
                <!-- Confirmation Message -->
                <p>Are you sure you want to delete this subcategory?</p>
                <!-- Subcategory Name Displayed for Confirmation -->
                <p><strong id="subcategory-name-to-delete"></strong></p>
            </div>
            <!-- ================= Modal Footer ================= -->
            <div class="modal-footer">
                <!-- Close Button -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Delete Button -->
                <button id="delete-subcategory-btn" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
