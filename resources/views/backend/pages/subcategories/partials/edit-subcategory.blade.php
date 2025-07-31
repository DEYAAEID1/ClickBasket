<!-- ================= Edit Subcategory Modal ================= -->
<div class="modal fade" id="editModalSubcategory" tabindex="-1" aria-labelledby="editModalSubcategoryLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <!-- ================= Modal Header ================= -->
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="editModalSubcategoryLabel">Edit Subcategory</h5>
                <!-- Close Button -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- ================= Modal Body ================= -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-9 mx-auto" style="width: 100%">
                        <div class="card">
                            <div class="card-body">
                                <!-- ================= Edit Subcategory Form ================= -->
                                <form id="editSubcategoryForm" method="POST">
                                <!-- CSRF Token for Security -->
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">
                                        <!-- ================= Category Dropdown ================= -->
                                        <label style="color: rgb(0, 60, 255); margin-bottom:5px">Select Category
                                            <span style="color: red; margin-bottom:5px">*</span>
                                        </label>
                                        <select class="form-control mb-3" name="category_id">
                                            <!-- Here you should dynamically populate categories -->
                                            <option value="">Changes Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <!-- ================= Subcategory Name ================= -->
                                        <label style="color: rgb(0, 60, 255); margin-bottom:5px">Subcategory Name
                                            <span style="color: red; margin-bottom:5px">*</span></label>
                                        <input class="form-control mb-3" type="text" name="name">

                                        <!-- ================= Slug ================= -->
                                        <label style="color: rgb(0, 60, 255); margin-bottom:5px">Description</label>
                                        <input class="form-control mb-3" type="text" name="description">

                                        <!-- ================= Image ================= -->
                                        <label style="color: rgb(0, 60, 255); margin-bottom:5px">Image</label>
                                        <input class="form-control mb-3" type="file" name="image" accept="image/*">

                                        <!-- ================= Modal Footer ================= -->
                                        <div class="modal-footer">
                                            <!-- Close Button -->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <!-- Submit Button to Save Changes -->
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>