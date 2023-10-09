<div class="build-container col-12">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group row">
                <label class="col-md-12 col-form-label">Build Image</label>
                <div class="col-md-12">

                    <div class="image-preview" onclick="openFileInput(this)">
                        Click here to upload an image
                    </div>
                    <input type="file" class="image-upload" accept="image/*" onchange="previewImage(this)">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Height</label>
                <div class="col-md-8">
                    <input type="number" class="form-control item-whq item-height" step="0.01" min="0.000">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Width</label>
                <div class="col-md-8">
                    <input type="number" class="form-control item-whq item-width" step="0.01" min="0.000">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Quantity</label>
                <div class="col-md-8">
                    <input type="number" class="form-control item-whq item-quantity" value="1" step="1" min="1">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label">Notes
                </label>
                <div class="col-md-8">
                    <textarea class="form-control" style="resize: none;" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-8 spec-container">
            <div class="row">
                <div class="col-12">

                    <div class="flex justify-between">
                    Specification
                        <div class="flex">
                            <a href="javascript:void(0)" class="btn btn-sm btn-success"
                               onclick="{$(this).closest('.spec-container').find('.form-upgrade').toggle()}">
                                Upgrade</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-success ml-1"
                               onclick="{$(this).closest('.spec-container').find('.form-glass-upgrade').toggle()}">Glass
                                Upgrade</a>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">
                            Product Type
                        </label>
                        <div class="col-md-9">
                            <input class="form-control item-type autocomplete-input" placeholder="Product Type"
                                   data-type="{{\App\Models\Quotation::PRODUCT_TYPE}}" style="resize: none;"/>
                            <input type="hidden" name="type" class="hidden-input hidden-input-product-type"
                                   data-type="type">
                        </div>
                    </div>

                    <div class="form-group row form-upgrade" style="display: none">
                        <label class="col-md-3 col-form-label">Upgrade</label>
                        <div class="col-md-9">
                            <input class="form-control item-upgrade item-whq autocomplete-input" placeholder="Upgrade"
                                   data-type="{{\App\Models\Quotation::UPGRADE}}" style="resize: none;"/>
                            <input type="hidden" name="frame" class="hidden-input hidden-input-upgrade"
                                   data-type="upgrade">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Handle
                        </label>
                        <div class="col-md-9">
                            <input class="form-control item-handle autocomplete-input" placeholder="Handle"
                                   data-type="{{\App\Models\Quotation::HANDLE}}" style="resize: none;">
                            <input type="hidden" name="frame" class="hidden-input" data-type="handle">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Frame
                        </label>
                        <div class="col-md-9">
                            <input class="form-control item-frame autocomplete-input" placeholder="Frame"
                                   data-type="{{\App\Models\Quotation::FRAME}}" style="resize: none;">
                            <input type="hidden" name="frame" class="hidden-input" data-type="frame">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label flex justify-between">
                                Glass
                        </label>
                        <div class="col-md-9">
                            <input class="form-control item-glass autocomplete-input" placeholder="Glass"
                                   data-type="{{\App\Models\Quotation::GLASS}}" style="resize: none;">
                            <input type="hidden" name="frame" class="hidden-input" data-type="glass">
                        </div>
                    </div>
                    <div class="form-group row form-glass-upgrade" style="display: none">
                        <label class="col-md-3 col-form-label">Upgrade Glass
                        </label>
                        <div class="col-md-9">
                            <input class="form-control item-upgrade-glass autocomplete-input" placeholder="Upgrade Glass"
                                   data-type="{{\App\Models\Quotation::UPGRADE_GLASS}}" style="resize: none;">
                            <input type="hidden" name="frame" class="hidden-input" data-type="upgrade_glass">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Build Price
                        </label>
                        <div class="col-md-9">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td width="50%">Base Price</td>
                                    <td><span class="spec-base-price"></span></td>
                                </tr>
                                <tr>
                                    <td>Upgrades</td>
                                    <td><span class="spec-upgrade-price"></span></td>
                                </tr>
                                <tr>
                                    <td>Glass Upgrade</td>
                                    <td><span class="spec-glass-upgrade-price"></span></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span class="spec-total-price"></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mb-4">
</div>
