<div class="tabcontent location-container col-12 {{($class??'')}}" data-id="1">
    <div class="row">
        <div class="item-build-container col-md-12 col-lg-12">
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
