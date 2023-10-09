$(document).on('click','#add-new-item',function(){
    const newItemCopy = $('#new-item-place-holder').html();
    $('.add-item').append($(newItemCopy).clone())

    const inputFields = $('.autocomplete-input');
    inputFields.each(function () {
        initializeAutocomplete($(this))
    });

    const dimensionsQuantity = $('.item-whq');
    dimensionsQuantity.each(function () {
        initializeWHQ($(this))
    });
});
