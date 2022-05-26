var getUserPrescriptionsResult;
var getUserPrescriptionResult;

function scanned(json){

}

function getUserPrescriptions(userID) {
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'getPatientPrescriptions', arguments: [userID]},

        success: function (obj) {
            if (!('error' in obj)) {
                getUserPrescriptionsResult = obj.result;
            } else {
                getUserPrescriptionsResult= obj.error;
            }
        }
    });
}

function getPrescriptionByID(prescriptionID) {
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'getPrescriptionByID', arguments: [prescriptionID]},

        success: function (obj) {
            if (!('error' in obj)) {
                getUserPrescriptionResult = obj.result;
            } else {
                getUserPrescriptionResult= obj.error;
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

    $(".table-striped").find('tr[data-id]').on('click', function () {
        var prescriptionID = parseInt($(this).data('id'));
        var message = $(this).data('bloodwork').replaceAll("&nbsp", " ");
        getPrescriptionByID(prescriptionID);
        var currentPrescription = getUserPrescriptionResult[0];
        if(currentPrescription["collected"]==null)
        $('#prescriptionID').html($('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>'+
            '<b> Prescription ID: ' + currentPrescription["ID"] + '</b>'));

        $('#patientID').html($(
            '<b> Medication: ' + currentPrescription["patientID"] + '</b>'));

        $('#medicationName').html($(
            '<b> Medication: ' + currentPrescription["medicationName"] + '</b>'));

        $('#datePrescribed').html($(
            '<b> Date Prescribed: ' + currentPrescription["prescribed"] + '</b>'));

        $('#dateCollected').html($(
            '<b> Date Collected: ' + currentPrescription["collected"] + '</b>'));

        $('#message').html($(
            '<b> Message: ' + message + '</b>'));

        $('#QR').html($(
            '<canvas id="qr-code"></canvas>'));

        var qr;
        (function() {
            qr = new QRious({
                element: document.getElementById('qr-code'),
                size: 200,
                value: 'https://studytonight.com'
            });
        })();

        function generateQRCode(qrtext) {
            qr.set({
                foreground: 'black',
                size: 200,
                value: qrtext
            });
        }

        let stringify = currentPrescription["ID"].toString()
        let jsonParsed = "{\"ID\": \""+stringify+"\"}";

        generateQRCode(jsonParsed);

        document.getElementById("btnPrint").onclick = function () {
            printElement(document.getElementById("printThis"));

        }

        function printElement(elem) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }
    });

});

function constructTable(selector,userID) {

    getUserPrescriptions(userID);
    var list = getUserPrescriptionsResult;

    // Function that loads in JSON here

    // Get headers
    var cols = Headers(list, selector);

    // Traversing the JSON data
    for (var i = 0; i < list.length; i++) {
        var row = $('<tr data-toggle="modal" data-id='+list[i]["ID"]+' data-bloodwork ='+(list[i]["Missing_Bloodwork"].replaceAll(" ","&nbsp"))+'  data-target="#userModal"/>');
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