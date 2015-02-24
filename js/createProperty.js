function validateCreateProperty(form) {
    var address1 = form['address1'].value;
    var address2 = form['address2'].value;
    var town = form['town'].value;
    var county = form['county'].value;
    var description = form['description'].value;
    var rent = form['rent'].value;
    var bedrooms = form['bedrooms'].value;

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }

    var errors = new Object();

    if (address1 === "") {
        errors["address1"] = "Address1 cannot be empty\n";
    }
    if (address2 === "") {
        errors["address2"] = "Address2 cannot be empty\n";
    }
    if (town === "") {
        errors["town"] = "Town cannot be empty\n";
    }
    if (county === "") {
        errors["county"] = "County cannot be empty\n";
    }
    if (description === "") {
        errors["description"] = "Description cannot be empty\n";
    }
    if (rent === "") {
        errors["rent"] = "Rent cannot be empty\n";
    }
    if (bedrooms === "") {
        errors["bedrooms"] = "Bedrooms cannot be empty\n";
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

/* This is the validation for the Property Form in javascript */