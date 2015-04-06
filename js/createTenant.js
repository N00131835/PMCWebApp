function validateCreateTenant(form) {
    var FirstName = form['FirstName'].value;
    var LastName = form['LastName'].value;
    var DOB = form['DOB'].value;
    var Gender = form['Gender'].value;
    var Email = form['Email'].value;
    var MobileNum = form['MobileNum'].value;
    var PropertyID = form['PropertyID'].value;
    var StartLease = form['StartLease'].value;
    var Duration = form['Duration'].value;

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }

    var errors = new Object();

    if (FirstName === "") {
        errors["FirstName"] = "FirstName cannot be empty\n";
    }
    if (LastName === "") {
        errors["LastName"] = "LastName cannot be empty\n";
    }
    if (DOB === "") {
        errors["DOB"] = "DOB cannot be empty\n";
    }
    if (Gender === "") {
        errors["Gender"] = "Gender cannot be empty\n";
    }
    if (Email === "") {
        errors["Email"] = "Email cannot be empty\n";
    }
    if (MobileNum === "") {
        errors["MobileNum"] = "MobileNum cannot be empty\n";
    }
    if (PropertyID === "") {
        errors["PropertyID"] = "PropertyID cannot be empty\n";
    }
    if (StartLease === "") {
        errors["StartLease"] = "StartLease cannot be empty\n";
    }
    if (Duration === "") {
        errors["Duration"] = "Duration cannot be empty\n";
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

/* This is the validation for the Tenant Form in javascript */