<section class="space-y-6">
    <header>
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Quotation') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Please enter location first, height, width and quantity. Then the product type, frame and other information.
        </p>
    </header>
    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <table class="table table-auto">
                <thead>
                <tr>
                    <th>Locations</th>
                    <th class="text-right">Price</th>
                </tr>
                </thead>
                <tbody id="location-table-body">
                    <tr class="table-preview-tr" data-id="1">
                        <td>Location 1</td>
                        <td class="text-right">0</td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary btn-block add-quotation" type="button" id="add-new-item">Add new Location</button>
        </div>
        <div class="col-lg-9 col-sm-9">
            <div class="row add-item">
                <div id="new-item-place-holder" class="hidden">
                    @include('quotation.item')
                </div>
                @include('quotation.item', ['class'=>'active'])
            </div>
        </div>
    </div>

</section>
