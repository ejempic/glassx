<!-- item.blade.php -->
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
                <div class="col-lg-6">
                    <h6>Specification</h6>
                    <table class="location-item-table-specification">
                        <tbody>
                        <tr>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <h6>Location Total</h6>
                    <table class="location-item-table-total">
                        <tbody>
                        <tr>
                            <td>Base Price</td>
                            <td><span class="litt-base-price"></span></td>
                        </tr>
                        <tr>
                            <td>Upgrade</td>
                            <td><span class="litt-upgrade-price"></span></td>
                        </tr>
                        <tr>
                            <td>Glass Upgrade</td>
                            <td><span class="litt-gupgrade-price"></span></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><span class="litt-total-price"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-success btn-sm btn-block add-new-build-btn mr-1" type="button"><i
                            class="text-md font-weight-bolder">+</i> Additional Build
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr class="mb-4">
</div>
