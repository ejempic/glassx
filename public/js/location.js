$(document).on('click','#add-new-item',function(){
    unselectCurrentTab()
    addNewRow()
    const inputFields = $('.autocomplete-input');
    inputFields.each(function () {
        initializeAutocomplete($(this))
    });

    const dimensionsQuantity = $('.item-whq');
    dimensionsQuantity.each(function () {
        initializeWHQ($(this))
    });
});

$(document).on('keyup','.location-name', function(){
    const locationName = $(this);
    const rowCount = locationName.data("id");
    const itemBuildContainer = locationName.closest('.item-build-container');
    $('.table-preview-tr[data-id="'+rowCount+'"]').find('td:first-child').html(locationName.val())
    itemBuildContainer.find('input.location-name[data-id="'+rowCount+'"]').val(locationName.val());
});

$(document).on('click','.location-delete', function(){
    const deleteButton = $(this);
    const tabContent = deleteButton.closest('.tabcontent');
    const rowCount = tabContent.data("id")
    tabContent.remove()
    $('.table-preview-tr[data-id="'+rowCount+'"]').remove()
    $('.table-preview-tr').click()
});

$(document).on('click','.table-preview-tr', function(){
    unselectCurrentTab()
    const selectedTr = $(this);
    $('.tabcontent[data-id="'+selectedTr.data('id')+'"]').addClass('active')
    $('.table-preview-tr[data-id="'+selectedTr.data('id')+'"]').addClass('active')
});
function addNewRow(){
    const newItemCopy = $('#new-item-place-holder').html();
    var rowCount = addNewPreviewRow()
    var itemClone = $(newItemCopy).clone()

    /**
     * Location Name
     */
    const locationInput = itemClone.find('.location-name');
    locationInput.val('Location '+rowCount);
    locationInput.attr("data-id", rowCount);
    locationInput.data("id", rowCount);

    itemClone.attr("data-id", rowCount);
    itemClone.data("id", rowCount);
    itemClone.addClass("active");
    $('.add-item').append(itemClone)
}

function unselectCurrentTab(){
    $(".tabcontent").removeClass('active');
    $(".table-preview-tr").removeClass('active');
}

function addNewPreviewRow(){

    var tbody = document.getElementById("location-table-body");
    var rowCount = tbody.getElementsByTagName("tr").length+1;
    const trId = $(tbody).find('tr').last().data('id');
    console.log(trId);
    if(trId !== rowCount){
        // rowCount = trId
    }
    var newRow = document.createElement("tr");
    newRow.className = "table-preview-tr active";
    newRow.setAttribute("data-id", rowCount);

    // Create and add <td> elements to the new <tr>
    var locationTd = document.createElement("td");
    locationTd.textContent = "Location "+ rowCount;
    newRow.appendChild(locationTd);

    var countTd = document.createElement("td");
    countTd.className = "text-right";
    countTd.textContent = "0";
    newRow.appendChild(countTd);

    // Append the new <tr> to the existing or new <tbody>
    tbody.appendChild(newRow);

    return rowCount;
}
