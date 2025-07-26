<div class="modal fade" id="editModalproduct" tabindex="-1" aria-labelledby="editModalproductLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalproductLabel">Edit product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-9 mx-auto" style="width: 100%">
                        <div class="card">
                            <div class="card-body">
                                <form id="editproductForm" method="POST">
                                    @csrf

                                    <div class="card-body">
                                        <label style="color: rgb(0, 60, 255) ; margin-bottom:5px">product Name
                                            <span style="color: red ; margin-bottom:5px">*</span></label>

                                        <input class="form-control mb-3" type="text" name="name">

                                        <label style="color: rgb(0, 60, 255) ; margin-bottom:5px">Slug</label>

                                        <input class="form-control mb-3" type="text" name="slug">


                                        <label style="color: rgb(0, 60, 255); margin-bottom:5px">Image</label>
                                        <input class="form-control mb-3" type="file" name="image" accept="image/*" required>

                                        <input class="form-control mb-3" type="text" name="image">

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

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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