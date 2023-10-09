<section class="space-y-6">
    <header>
        <h2 class="text-xl font-medium text-gray-900">
            {{ __('Items') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Please enter location first, height, width and quantity. Then the product type, frame and other information.
        </p>
    </header>

    <div class="row add-item">
        <div id="new-item-place-holder" class="hidden">
            @include('quotation.item')
        </div>
        @include('quotation.item')
    </div>
    <button class="btn btn-primary btn-block add-quotation" type="button" id="add-new-item">Add new item</button>

</section>


{{--<h4 class="mb-3">Items</h4>--}}
{{--<hr class="mb-4">--}}
