var getPermissionResult;
var checkPermissionResult;
var changePermissionResult;
var getUsersResult;
var getUserResult;
var getMedicationsResult;
var giveMedicationsResult;
var getUserPrescriptionsResult;
var checkPrescriptionBloodworkResult;
var distributeResult;
var distribute;

function scanned(prescriptionString, normal=true) {
    let prescriptionID;
    if (normal) {
        let prescription = JSON.parse(prescriptionString);
        prescriptionID = parseInt(prescription["ID"]);
    }
    else{let prescriptionID = prescriptionString;}
    checkPrescriptionBloodwork(prescriptionID);
    let result = checkPrescriptionBloodworkResult;
    if (checkPrescriptionBloodworkResult["prescription"]["Date Collected"] != null) {
        alert("That prescription has already beed collected on " + checkPrescriptionBloodworkResult["prescription"]["Date Collected"])
    } else {


        $(function () {
            $('#prescriptionModal').modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on('show', function () {

            });

            $('#bloodworkLevel').html($(
                '<b> Bloodwork Level ' + result["bloodworkLevel"] + '</b>'));

            $('#prescriptionID').html($(
                '<b> Prescription ID: ' + result["prescription"]["ID"] + '</b>'));

            $('#medicationName').html($(
                '<b> Medication: ' + result["prescription"]["Medication"] + '</b>'));

            $('#datePrescribed').html($(
                '<b> Date prescribed: ' + result["prescription"]["Date Prescribed"] + '</b>'));

            let give = result["givePrescription"];
            let givemsg = "";

            if (give === 0){
                givemsg = "This prescription has the required (if needed) bloodwork";
                distribute = true;
            }
            else if (give === 1){
                givemsg = "This prescription should have up-to-date bloodwork for "+result["bloodworkName"]+" but it can still be given";
                distribute = true;
            }
            else{
                givemsg = "This prescription cannot be given without up-to-date bloodwork for "+result["bloodworkName"];
                distribute = false;
            }


            $('#give').html($(
                '<b> Message: ' + givemsg + '</b>'));

        });

        $('#prescriptionModal').modal().show();

    }
}


function distributeMedication(){
    if (distribute === true){
        let prescriptionID = checkPrescriptionBloodworkResult["prescription"]["ID"];
        jQuery.ajax({
            type: "POST",
            async: false,
            url: 'ajax/patientMedication.php',
            dataType: 'json',
            data: {functionName: 'collectPatientMedication', arguments: [prescriptionID]},

            success: function (obj) {
                if (!('error' in obj)) {
                    distributeResult = obj.result;
                } else {
                    distributeResult = obj.error;
                }
            }
        });
    }
    else{
        distributeResult = "The distribution of this prescription is disallowed due to lack of bloodwork!";
    }

    alert(distributeResult);
}


function checkPrescriptionBloodwork(userID) {
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'checkPrescriptionBloodwork', arguments: [userID]},

        success: function (obj) {
            if (!('error' in obj)) {
                checkPrescriptionBloodworkResult = obj.result;
            } else {
                checkPrescriptionBloodworkResult= obj.error;
            }
        }
    });
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

    var dropdown = $('#drop-btn');

    for (i in getMedicationsResult){
        dropdown.append('<option value='+getMedicationsResult[i]["ID"]+'>'+getMedicationsResult[i]["medicationName"]+'</option>')
    }

}

function medicationComboBoxValue() {
    cbElement = document.getElementById("drop-btn");
    cbValue = cbElement.options[cbElement.selectedIndex].value;
    return parseInt(cbValue);
}

function prescribeMedication() {
    let userID = parseInt(getUserResult["ID"]);
    let medicationID = medicationComboBoxValue();
    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/patientMedication.php',
        dataType: 'json',
        data: {functionName: 'prescribe', arguments: [userID, medicationID, $("#date-picker-id").val()]},

        success: function (obj) {
            if (!('error' in obj)) {
                giveMedicationsResult = obj.result;
            } else {
                console.log(obj.error);
            }
        }
    });
    alert(giveMedicationsResult)
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

    getUsers();
    var list = getUsersResult;
    // Function that loads in JSON here

    // Get headers
    var cols = Headers(list, selector);

    // Traversing the JSON data
    for (var i = 0; i < list.length; i++) {
        getPermission(getUsersResult[i]["ID"]);
        if (getPermissionResult === "user") {
            var row = $('<tr data-toggle="modal" data-id=' + getUsersResult[i]["ID"] + ' data-target="#userModal"/>');
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

    $(function () {
        $('#userModal').modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on('show', function () {

        });

        getMedications();

        $(".table-striped").find('tr[data-id]').on('click', function () {
            var userID = parseInt($(this).data('id'));
            getUser(userID);
            getPermission(userID);
            getUserPrescriptions(userID);
            constructPrescriptionTable($("#prescriptionTable"))
            var currentUser = getUserResult;
            $('#userID').html($(
                '<b> UserID: ' + currentUser["ID"] + '</b>'));

            $('#userName').html($('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>'+
                '<b> Username: ' + currentUser["username"] + '</b>'));

            $('#userEmail').html($(
                '<b> Email: ' + currentUser["email"] + '</b>'));
        });

    });

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

function constructPrescriptionTable(selector) {
    $("#prescriptionTable tr").remove()
    // Function that loads in JSON here
    list = getUserPrescriptionsResult;
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

function getPermission(userID) {

    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/uac.php',
        dataType: 'json',
        data: {functionName: 'getPermission', arguments: [userID]},

        success: function (obj) {
            if (!('error' in obj)) {
                getPermissionResult = obj.result;
            } else {
                console.log(obj.error);
            }
        }
    });
}

function checkPermission(userID, permission) {

    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/uac.php',
        dataType: 'json',
        data: {functionName: 'checkPermission', arguments: [userID, permission]},

        success: function (obj) {
            if (!('error' in obj)) {
                checkPermissionResult = obj.result;
            } else {
                console.log(obj.error);
            }
        }
    });
}

function getUsers() {

    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/uac.php',
        dataType: 'json',
        data: {functionName: 'getUsers', arguments: [false]},

        success: function (obj) {
            if (!('error' in obj)) {
                getUsersResult = obj.result;
            } else {
                console.log(obj.error);
            }
        }
    });
}

function getUser(userID) {

    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/uac.php',
        dataType: 'json',
        data: {functionName: 'getUser', arguments: [userID]},

        success: function (obj) {
            if (!('error' in obj)) {
                getUserResult = obj.result;
            } else {
                console.log(obj.error);
            }
        }
    });

}
