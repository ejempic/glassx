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

    const locationContainer = itemBuildContainer.closest('.location-container');
    const locationDataId = locationContainer.data('id');
    const locationName = $('.table-preview-tr[data-id="'+locationDataId+'"]').find('td:first-child').html();
    $(addBuildContainer).find('.location-name').val(locationName)
    itemBuildContainer.find('.location-input-div:gt(1)').hide()
});
$(document).on('click','.build-delete',function(){

    $(this).closest('.item-build-container').find('.location-input-div:gt(1)').show()
    $(this).closest('.build-container').find('.location-input-div:gt(1)').hide()
    $(this).closest('.build-container').remove()
});
