function formatMoney(number, currencySymbol = "₱", decimalPlaces = 2) {
    // Check if the number is valid
    if (typeof number !== "number" || isNaN(number)) {
        return ;
    }

    // Convert the number to a fixed number of decimal places
    const fixedNumber = number.toFixed(decimalPlaces);

    // Add commas for thousands
    const parts = fixedNumber.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Combine the currency symbol and the formatted number
    return currencySymbol + parts.join(".");
}

$(document).ready(function () {
    // Get all input fields with the 'autocomplete-input' class
    const inputFields = $('.autocomplete-input');
    inputFields.each(function () {
        initializeAutocomplete($(this))
    });

    const dimensionsQuantity = $('.item-whq');
    dimensionsQuantity.each(function () {
        initializeWHQ($(this))
    });
});

function initializeWHQ(inputField){

    let loadingPrices = false;
    inputField.on('input', function () {
        var hiddenInputs = inputField.closest('.build-container').find('.hidden-input');
        var buildBasePrice = inputField.closest('.build-container').find('.spec-base-price');
        var buildUpgradePrice = inputField.closest('.build-container').find('.spec-upgrade-price');
        var buildGlassUpgradePrice = inputField.closest('.build-container').find('.spec-glass-upgrade-price');
        const itemBuildHeight = inputField.closest('.build-container').find('.item-height').val()
        const itemBuildWidth = inputField.closest('.build-container').find('.item-width').val()
        const itemBuildQuantity = inputField.closest('.build-container').find('.item-quantity').val()
        const upgradeValue = inputField.closest('.build-container').find('.hidden-input-upgrade').val()

        if(itemBuildHeight === undefined || itemBuildWidth === undefined || itemBuildQuantity === undefined){
            return;
        }
        var requestData = {};
        hiddenInputs.each(function () {
            requestData[$(this).data('type')] = $(this).val();
        });
        requestData['upgrade'] = upgradeValue;
        requestData['height'] = itemBuildHeight;
        requestData['width'] = itemBuildWidth;
        requestData['quantity'] = itemBuildQuantity;

        if(!loadingPrices){
            loadingPrices = true
            $.post('/api/get-price', {query: JSON.stringify(requestData)}, function (data) {
                buildUpgradePrice.data('amount', data.upgrade_price)
                buildUpgradePrice.html(formatMoney(data.upgrade_price))
                buildBasePrice.data('amount',data.base_price)
                buildBasePrice.html(formatMoney(data.base_price))
                buildGlassUpgradePrice.data('amount',data.glass_price)
                buildGlassUpgradePrice.html(formatMoney(data.glass_price))
                displayBuildTotal(inputField.closest('.build-container'))
                loadingPrices = false;
            }).fail(function (error) {
                console.error(error);
            });
        }
    });
}

$(document).on()

function checkPriceBaseOnInputs(inputField) {

    var hiddenInputs = inputField.closest('.build-container').find('.hidden-input');
    var buildBasePrice = inputField.closest('.build-container').find('.spec-base-price');
    var buildUpgradePrice = inputField.closest('.build-container').find('.spec-upgrade-price');
    var buildGlassUpgradePrice = inputField.closest('.build-container').find('.spec-glass-upgrade-price');
    const itemBuildHeight = inputField.closest('.build-container').find('.item-height').val()
    const itemBuildWidth = inputField.closest('.build-container').find('.item-width').val()
    const itemBuildQuantity = inputField.closest('.build-container').find('.item-quantity').val()

    var requestData = {};
    hiddenInputs.each(function () {
        requestData[$(this).data('type')] = $(this).val();
    });
    requestData['height'] = itemBuildHeight;
    requestData['width'] = itemBuildWidth;
    requestData['quantity'] = itemBuildQuantity;

    console.log(requestData)
    let loadingPrices = false;
    if(!loadingPrices){
        loadingPrices = true;
        $.post('/api/get-price', {query: JSON.stringify(requestData)}, function (data) {
            buildBasePrice.data('amount',data.base_price)
            buildBasePrice.html(formatMoney(data.base_price))
            buildUpgradePrice.data('amount',data.upgrade_price)
            buildUpgradePrice.html(formatMoney(data.upgrade_price))
            buildGlassUpgradePrice.data('amount',data.glass_price)
            buildGlassUpgradePrice.html(formatMoney(data.glass_price))
            displayBuildTotal(inputField.closest('.build-container'))
            loadingPrices = false;
        }).fail(function (error) {
            console.error(error);
        });
    }
}

function displayBuildTotal(itemBuilds){
    var buildBasePrice = itemBuilds.find('.spec-base-price').data('amount');
    var buildUpgradePrice = itemBuilds.find('.spec-upgrade-price').data('amount');
    var buildGlassUpgradePrice = itemBuilds.find('.spec-glass-upgrade-price').data('amount');
    const buildTotalPrice = itemBuilds.find('.spec-total-price');

    var total = 0;
    if(buildBasePrice){
        total +=buildBasePrice;
    }

    if(buildUpgradePrice){
        total +=buildUpgradePrice;
    }

    if(buildGlassUpgradePrice){
        total +=buildGlassUpgradePrice;
    }

    buildTotalPrice.html(formatMoney(total));
}

function clearOtherElements(inputField) {
    const inputFields = inputField.closest('.spec-container').find('.autocomplete-input');
    inputFields.each(function () {
        const inputField = $(this);
        if (inputField.data('type') !== 'product_type') {
            inputField.val('')
            inputField.parent().find('.hidden-input').val('');
        }
    });
}

function initializeAutocomplete(inputField) {
    const ul = $('<ul class="suggestions"></ul>');
    const inputType = inputField.data('type');
    const hiddenInput = inputField.parent().find('.hidden-input');

    ul.on('click', function (event) {
        if (!ul.is(event.target) && ul.has(event.target).length === 0 && !inputField.is(event.target)) {
            ul.html('');
        }
    });
    inputField.on('click', function () {

        const itemBuildHeight = inputField.closest('.build-container').find('.item-height').val()
        const itemBuildWidth = inputField.closest('.build-container').find('.item-width').val()
        const itemBuildQuantity = inputField.closest('.build-container').find('.item-quantity').val()

        if (itemBuildHeight === "" || itemBuildWidth === "" || itemBuildQuantity === "") {
            alert('Please set Height, Width and Quantity first!')
            return;
        }

        if (inputType === "product_type") return;

        if (inputType !== "product_type") {
            const hiddenInputsProductType = inputField.closest('.spec-container').find('.hidden-input-product-type').val();

            if (hiddenInputsProductType === "") {
                return;
            }
        }

        if ((inputType === "upgrade" || inputType === "product_type") && (itemBuildHeight === "" || itemBuildWidth === "" || itemBuildQuantity === "")) {
            alert('Please set Height, Width and Quantity first!')
            return;
        }
        listSuggestion(null, ul, inputField, inputType, hiddenInput)
        inputField.parent().append(ul);
    });

    inputField.on('input', function () {

        const itemBuildProductType = inputField.closest('.build-container').find('.hidden-input-product-type').val()

        if(itemBuildProductType === "" && inputField.data('type') !== "product_type"){
            return;
        }

        const value = $(this).val();

        if (value.length === 0) {
            hiddenInput.val('')
            checkPriceBaseOnInputs(inputField)
            return;
        }

        listSuggestion(value, ul, inputField, inputType, hiddenInput)

        inputField.parent().append(ul);
    });

    inputField.on('keydown', function (e) {
        const ul = $(this).parent().find('.suggestions');
        const selectedLi = ul.find('li.selected');

        switch (e.keyCode) {
            case 40: // Down arrow key
                e.preventDefault();
                if (selectedLi.length === 0) {
                    ul.find('li:first').addClass('selected');
                } else {
                    const nextLi = selectedLi.next('li');
                    selectedLi.removeClass('selected');
                    if (nextLi.length === 0) {
                        ul.find('li:first').addClass('selected');
                    } else {
                        nextLi.addClass('selected');
                    }
                }
                break;
            case 38: // Up arrow key
                e.preventDefault();
                if (selectedLi.length === 0) {
                    ul.find('li:last').addClass('selected');
                } else {
                    const prevLi = selectedLi.prev('li');
                    selectedLi.removeClass('selected');
                    if (prevLi.length === 0) {
                        ul.find('li:last').addClass('selected');
                    } else {
                        prevLi.addClass('selected');
                    }
                }
                break;
            case 13: // Enter key
                e.preventDefault();
                if (selectedLi.length === 1 && selectedLi.hasClass('missing') === false) {
                    const selectedSuggestion = selectedLi.text();
                    const selectedId = selectedLi.data('id');
                    selectedLi.parent().parent().find('.hidden-input').val(selectedId)
                    inputField.val(selectedSuggestion);
                    ul.html('');

                    if (inputField.data('type') === 'product_type') {
                        clearOtherElements(inputField);
                    }
                }
                break;
        }
    });
}

function listSuggestion(value, ul, inputField, inputType, hiddenInput) {
    var hiddenInputsProductType = inputField.closest('.spec-container').find('.hidden-input-product-type').val();

    // Make an AJAX request and include the query parameter
    const requestData = {query: value, type: inputType, product_type: hiddenInputsProductType};

    // Make an AJAX request to fetch suggestions
    $.post('/api/quotation', requestData, function (data) {
        ul.html('');
        data.suggestions.forEach(function (suggestion) {
            const li = $(`<li data-id="${suggestion.id}">${suggestion.name}</li>`);
            li.on('click', function () {
                if (inputField.data('type') === 'product_type') {
                    clearOtherElements(inputField);
                }
                hiddenInput.val(suggestion.id);
                inputField.val(suggestion.name);
                checkPriceBaseOnInputs(inputField)
                ul.html('');
                ul.remove()
            });
            ul.append(li);
        });

        if (data.suggestions.length === 0) {
            ul.empty();
            const addNewLi = $(`<li class="missing">Try again, <span class="font-weight-bolder">(${value})</span> not found.</li>`);
            ul.append(addNewLi);
        }
    }).fail(function (error) {
        console.error(error);
    });

}
