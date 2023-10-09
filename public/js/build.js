$(document).on('click','.add-new-build-btn',function(){

    const button = $(this);
    const itemBuildContainer = button.closest('.item-build-container');
    const newBuildCopy = itemBuildContainer.find('.new-build-place-holder').html();
    const addBuildContainer = itemBuildContainer.find('.add-build');
    addBuildContainer.append(newBuildCopy);

    const inputFields = $('.autocomplete-input');
    inputFields.each(function () {
        initializeAutocomplete($(this))
    });

    const dimensionsQuantity = $('.item-whq');
    dimensionsQuantity.each(function () {
        initializeWHQ($(this))
    });
    // $('.add-item').append($(newItemCopy).clone())
    //
    // const inputFields = $('.autocomplete-input');
    // inputFields.each(function () {
    //     initializeAutocomplete($(this))
    // });
    //
    // const dimensionsQuantity = $('.item-whq');
    // dimensionsQuantity.each(function () {
    //     initializeWHQ($(this))
    // });
});
