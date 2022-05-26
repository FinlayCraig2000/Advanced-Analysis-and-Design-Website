var getMedicationsResult;
var getMedInfoResults;

function getMedications(){
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'getMedications', arguments: [false]},

        success: function (obj) {
            if (!('error' in obj)) {
                getMedicationsResult = obj.result;
            } else {
                console.log(obj.error);
            }
        }

    });


}

function getBloodworksForMedication(medID){
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'getBloodworksForMedication', arguments: [parseInt(medID)]},

        success: function (obj) {
            if (!('error' in obj)) {
                getMedInfoResults = obj.result;
            } else {
                getMedInfoResults= obj.error;
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


function constructTable(selector) {

    getMedications();
    var list = getMedicationsResult;

    // Function that loads in JSON here

    // Get headers
    var cols = Headers(list, selector);

    // Traversing the JSON data
    for (var i = 0; i < list.length; i++) {
        var row = $('<tr data-toggle="modal" data-id='+[list[i]["ID"]+':'+list[i]["medicationName"]]+' data-target="#medModal"/>');
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

    $(function () {
        $('#medModal').modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on('show', function () {

        });

        $(".table-striped").find('tr[data-id]').on('click', function () {
            var data = $(this).data('id')
            var medName = data.split(":")[1];
            var medID = data.split(":")[0];
            getBloodworksForMedication(medID);
            constructMedTable($("#medTable"))
            $('#medName').html($('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>'+
                '<b>Blood work needed for '+medName+'</b>'));
        });

    });


}

function constructMedTable(selector) {
    $("#medTable tr").remove()
    // Function that loads in JSON here
    list = getMedInfoResults;
    // Get headers
    var cols = Headers(list, selector);

    // Traversing the JSON data
    for (var i = 0; i < list.length; i++) {
        var row = $('<tr>');
        for (var colIndex = 0; colIndex < cols.length; colIndex++) {
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

