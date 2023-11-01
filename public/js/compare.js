$(document).on('click','#add-quotation-to-compare',function(){

    let requestData = [];
    $.post('/api/add-quotation', requestData, function (data) {
        console.log(data)
    }).fail(function (error) {
        console.error(error);
    });

    // const table = $('#quotation-table-location-summary');
    // const compareContainer = $('#compare-container');
    //
    // let compareTable = '<div class="col-lg-3 col-sm-3 compare-table " ><table class="table table-bordered"><tbody>'
    //
    //
    //             //
    //             // <tr>
    //             //     <td width="50%">TYPE</td>
    //             //     <td><span class="">PRICE</span></td>
    //             // </tr>
    // compareTable += '</tbody>'
    //         //     <tfoot>
    //         //     <tr>
    //         //         <th>Total</th>
    //         //         <th>0</th>
    //         //     </tr>
    //         //     </tfoot>
    //         // </table>
    //
    // compareTable += '<button class="btn btn-primary btn-sm btn-block " type="button" id="">Select</button></div>'
    //
    // compareContainer.append(compareTable);
    // console.log(table)
    // console.log(compareContainer)
    // console.log(newCompareTable)

});
