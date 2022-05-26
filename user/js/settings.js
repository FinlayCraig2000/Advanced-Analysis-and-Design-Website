var getPermissionResult;
var checkPermissionResult;
var givePermissionResult;
var getUsersResult;
var getUserResult;

function FormGenerator() {
    var foreName = document.getElementById("userForename");
    var surName = document.getElementById("userSurname");
    var newPass = document.getElementById("userNewPass");
    var userEmail = document.getElementById("userEmail");


    foreName.value = "TEST";
    surName.value = "TEST2";
    newPass.value = "TEST3";
    userEmail.value = "TEST4";

}

function performButtonPress(event) {
    // avoid submitting like usual
    //event.preventDefault();
    var foreName = document.getElementById("userForename");
    var surName = document.getElementById("userSurname");
    var newPass = document.getElementById("userNewPass");
    var userEmail = document.getElementById("userEmail");

    var confirmPassword = document.getElementById("confirmPassword");
    // get bool if password is correct

    if (validateEmail(userEmail.value))
    {
        alert("YES");
    }
    else
    {
        alert("NO");
    }
}


function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
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
