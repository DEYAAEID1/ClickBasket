<!-- Create product Modal -->
<div class="modal fade" id="createproductModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create product Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createproductForm" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                   

                    <!-- Product Name -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Product Name
                        <span style="color: red; margin-bottom:5px">*</span>
                    </label>
                    <input class="form-control mb-3" type="text" name="name" required>

                    <!-- Slug -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Slug</label>
                    <input class="form-control mb-3" type="text" name="slug" required>

                    <!-- Description -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Description</label>
                    <textarea class="form-control mb-3" name="description" rows="5" required></textarea>

                    <!-- Image (upload file) -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Image</label>
                    <input class="form-control mb-3" type="file" name="image" accept="image/*" required>

                    <!-- Short Description (replacing Meta Title) -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Short Description</label>
                    <textarea class="form-control mb-3" name="short_description" rows="3" required></textarea>

                    <!-- Price (replacing Meta Description) -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Price</label>
                    <input class="form-control mb-3" type="number" name="price" step="0.01" required>

                    <!-- Subcategory -->
                     <label style="color: rgb(0, 60, 255); margin-bottom:5px">Subcategory</label>
                    <select class="form-control mb-3" name="subcategory_id" required>
                        <option value="">Select Subcategory</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach 
                    </select> 

                    <!-- Footer buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
