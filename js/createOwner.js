function validateCreateOwner(form) {
    var FirstName = form['FirstName'].value;
    var LastName = form['LastName'].value;
    var Address1 = form['Address1'].value;
    var Address2 = form['Address2'].value;
    var Town = form['Town'].value;
    var County = form['County'].value;
    var MobileNum = form['MobileNum'].value;
    var Email = form['Email'].value;

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }

    var errors = new Object();

    if (FirstName === "") {
        errors["FirstName"] = "Description cannot be empty\n";
    }
    if (LastName === "") {
        errors["LastName"] = "Description cannot be empty\n";
    }
    if (Address1 === "") {
        errors["Address1"] = "Address1 cannot be empty\n";
    }
    if (Address2 === "") {
        errors["Address2"] = "Address2 cannot be empty\n";
    }
    if (Town === "") {
        errors["Town"] = "Town cannot be empty\n";
    }
    if (County === "") {
        errors["County"] = "County cannot be empty\n";
    }
    if (MobileNum === "") {
        errors["rent"] = "Rent cannot be empty\n";
    }
    if (Email === "") {
        errors["Email"] = "Bedrooms cannot be empty\n";
    }

    var valid = true;
    for (var index in errors) {
        valid = false;
        var errorMessage = errors[index];
        var spanElement = document.getElementById(index + "Error");
        spanElement.innerHTML = errorMessage;
    }
    return valid;
}

/* This is the validation for the Owner Form in javascript */