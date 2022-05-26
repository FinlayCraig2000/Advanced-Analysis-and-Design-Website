var getUserBloodWorkResult;

function getUserBloodworks(userID) {
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'getPatientBloodworks', arguments: [userID]},

        success: function (obj) {
            if (!('error' in obj)) {
                getUserBloodWorkResult = obj.result;
            } else {
                getUserBloodWorkResult= obj.error;
            }
        }
    });
}

function searcher() {
    var input, filter, table, tr, td, i, txtValue;
    // Find search string
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("userTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

$(function () {
    $('#userModal').modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on('show', function () {

    });

});

function constructTable(selector,userID) {

    getUserBloodworks(userID);
    var list = getUserBloodWorkResult;

    // Function that loads in JSON here

    // Get headers
    var cols = Headers(list, selector);

    // Traversing the JSON data
    for (var i = 0; i < list.length; i++) {
        var row = $('<tr data-toggle="modal" data-id='+list[i]["ID"]+' data-target="#userModal"/>');
        for (var colIndex = 0; colIndex < cols.length; colIndex++)
        {
            var val = list[i][cols[colIndex]];

            // If there is any key, which is matching
            // with the column name
            if (val == null) val = "";
            row.append($('<td/>').html(val));

        }

        // Adding each row to the table
        $(selector).append(row);

    }

}

function Headers(list, selector) {
    var columns = [];
    var header = $('<tr/>');


    for (var i = 0; i < list.length; i++) {
        var row = list[i];
        for (var k in row) {

            if ($.inArray(k, columns) == -1) {
                columns.push(k);

                // Creating the header
                header.append($('<th/>').html(k));
            }
        }
    }

    // Appending the header to the table
    $(selector).append(header);
    return columns;
}