<!-- ================= Create Subcategory Modal ================= -->
<div class="modal fade" id="createSubcategoryModal" tabindex="-1" aria-labelledby="createSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <!-- ================= Modal Header ================= -->
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="createSubcategoryModalLabel">Create Subcategory Form</h5>
                <!-- Close Button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- ================= Modal Body ================= -->
            <div class="modal-body">
                <!-- ================= Subcategory Creation Form ================= -->
                <form id="createSubcategoryForm" method="POST" action="{{ route('subcategories.create') }}">
                     <!-- CSRF Token for Security -->
                    @csrf

                    <!-- ================= Category Dropdown ================= -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Select Category
                        <span style="color: red; margin-bottom:5px">*</span>
                    </label>
                    <select class="form-control mb-3" name="category_id" required>
                        <!-- Here you should dynamically populate categories -->
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>


                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Subcategory Name
                        <span style="color: red; margin-bottom:5px">*</span>
                    </label>
                    <input class="form-control mb-3" type="text" name="name" required>

                    <!-- ================= Slug ================= -->



                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Description</label>
                    <textarea class="form-control mb-3" name="description" rows="5" required></textarea>

                    <!-- ================= Image ================= -->
                    <label style="color: rgb(0, 60, 255); margin-bottom:5px">Image</label>
                    <input class="form-control mb-3" type="file" name="image" accept="image/*">

                    <!-- ================= Meta Title ================= -->


                    <!-- ================= Meta Description ================= -->

                    <!-- ================= Modal Footer with Buttons ================= -->
                    <div class="modal-footer">
                        <!-- Close Button -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>