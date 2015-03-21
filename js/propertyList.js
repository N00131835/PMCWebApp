window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createPropertyForm'
    //-------------------------------------------------------------------------
    var createPropertyForm = document.getElementById('createPropertyForm');
    if (createPropertyForm !== null) {
        createPropertyForm.addEventListener('submit', validatePropertyForm);
    }

    function validatePropertyForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#editPropertyForm'
    //-------------------------------------------------------------------------
    var editPropertyForm = document.getElementById('editPropertyForm');
    if (editPropertyForm !== null) {
        editPropertyForm.addEventListener('submit', validatePropertyForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProperty' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteProperty');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this?")) {
            event.preventDefault();
        }
    }
    
    //-------------------------------------------------------------------------
    
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#createPropertyForm'
    //-------------------------------------------------------------------------
    var createPropertyForm = document.getElementById('createOwnerForm');
    if (createPropertyForm !== null) {
        createPropertyForm.addEventListener('submit', validateOwnerForm);
    }

    function validateOwnerForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }
    
    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteOwner' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteOwner');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }
    
    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this?")) {
            event.preventDefault();
        }
    }

};