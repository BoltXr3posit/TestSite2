function validateForm() {
    var firstname = document.forms[0]["firstname"].value;
    var lastname = document.forms[0]["lastname"].value;
    var email = document.forms[0]["email"].value;
    var password = document.forms[0]["password"].value;

    if (firstname === "" || lastname === "" || email === "" || password === "") {
        alert("All fields must be filled out");
        return false;
    }
}
