<div class="location-container col-12">
    <div class="row">
        <div class="col-md-12 col-lg-3" style="border-right: 1px solid #ced4da;">
            <div class="form-group row">
                <label class="col-md-12 col-form-label">Location Image</label>
                <div class="col-md-12">
                    <div class="image-preview" onclick="openFileInput(this)">
                        Click here to upload an image
                    </div>
                    <input type="file" class="image-upload" accept="image/*" onchange="previewImage(this)">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-12 col-form-label">Location Name</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" value=""
                           placeholder="Please enter location name">
                </div>
            </div>
        </div>
        <div class="item-build-container col-md-12 col-lg-9">
            <div class="row add-build">
                <div class="new-build-place-holder hidden">
                    @include('quotation.build')
                </div>
                @include('quotation.build')
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-success btn-sm btn-block add-new-build-btn" type="button"><i
                            class="text-md font-weight-bolder">+</i> Additional Build
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr class="mb-4">

</div>
