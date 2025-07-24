<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Category Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createCategoryForm" method="POST">
                    @csrf
                    @method('put')

                    <!-- Category Name -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Category Name
                        <span style="color: red; margin-bottom:5px">*</span>
                    </label>
                    <input class="form-control mb-3" type="text" name="name" required>

                    <!-- Slug -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Slug</label>
                    <input class="form-control mb-3" type="text" name="slug" required>

                    <!-- Description -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Description</label>
                    <textarea class="form-control mb-3" name="description" rows="5" required></textarea>

                    <!-- Image -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Image</label>
                    <input class="form-control mb-3" type="text" name="image" required>

                    <!-- Meta Title -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Meta Title</label>
                    <input class="form-control mb-3" type="text" name="meta_title">

                    <!-- Meta Description -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Meta Description</label>
                    <textarea class="form-control mb-3" name="meta_description" rows="5"></textarea>

                    <!-- Footer buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="store-category-btn" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
