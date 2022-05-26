var getPermissionResult;
var checkPermissionResult;
var givePermissionResult;
var getUsersResult;
var getUserResult;

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

$(function(){
    $('#orderModal').modal({
        keyboard: true,
        backdrop: "static",
        show:false,

    }).on('show', function(){
        var getIdFromRow = $(event.target).closest('tr').data('id');
        //make your ajax call populate items or what even you need
        $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
    });
});

function constructTable(selector) {

    getUsers();
    var list = getUsersResult;
    // Function that loads in JSON here

    // Get headers
    var cols = Headers(list, selector);

    // Traversing the JSON data
    for (var i = 0; i < list.length; i++) {
        var row = $('<tr data-toggle="modal" data-id='+getUsersResult[i]["ID"]+' data-target="#userModal"/>');
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
        $('#userModal').modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on('show', function () {

        });

        $(".table-striped").find('tr[data-id]').on('click', function () {
            var userID = parseInt($(this).data('id'));
            getUser(userID);
            getPermission(userID);
            var currentUser = getUserResult;
            $('#userID').html($(
                '<b> UserID: ' + currentUser["ID"] + '</b>'));

            $('#userName').html($('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>'+
                '<b> Username: ' + currentUser["username"] + '</b>'));

            $('#userEmail').html($(
                '<b> Email: ' + currentUser["email"] + '</b>'));

            $('#userPermission').html($(
                '<b> Current Permission: ' + getPermissionResult + '</b>'));
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

function givePermissionComboboxValue() {

    cbElement = document.getElementById("drop-btn")
    cbValue = cbElement.options[cbElement.selectedIndex].text.toLowerCase()

    return cbValue;
}

function changePermission() {
    let userID = parseInt(getUserResult["ID"]);
    let permission = givePermissionComboboxValue();


    jQuery.ajax({
        type: "POST",
        async: false,
        url: 'ajax/uac.php',
        dataType: 'json',
        data: {functionName: 'changePermission', arguments: [userID, permission]},

        success: function (obj) {
            if (!('error' in obj)) {
                givePermissionResult = obj.result;
            } else {
                givePermissionResult = obj.error;
                console.log(obj.error);
            }
        }
    });

    alert(givePermissionResult);

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

    alert(checkPermissionResult);
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