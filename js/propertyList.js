window.onload = function () {
    //-------------------------------------------------------------------------
    // PROPERTY EVENT LISTENER
    //-------------------------------------------------------------------------
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#createPropertyForm'
    
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
    
    var editPropertyForm = document.getElementById('editPropertyForm');
    if (editPropertyForm !== null) {
        editPropertyForm.addEventListener('submit', validatePropertyForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteProperty' links
    var deleteLinks = document.getElementsByClassName('deleteProperty');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this Property?")) {
            event.preventDefault();
        }
    }
    
    
    //-------------------------------------------------------------------------
    // AREA EVENT LISTENER
    //-------------------------------------------------------------------------

    //-------------------------------------------------------------------------
    // define an event listener for the '#editAreaForm'
    
    var editAreaForm = document.getElementById('editAreaForm');
    if (editAreaForm !== null) {
        editAreaForm.addEventListener('submit', validateAreaForm);
    }
    
    function validateAreaForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }
    
    
    //-------------------------------------------------------------------------
    // OWNER EVENT LISTENER
    //-------------------------------------------------------------------------
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#createOwnerForm'
    
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
    // define an event listener for the '#editOwnerForm'
    
    var editOwnerForm = document.getElementById('editOwnerForm');
    if (editOwnerForm !== null) {
        editOwnerForm.addEventListener('submit', validateOwnerForm);
    }
    
    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteOwner' links
    var deleteLinks = document.getElementsByClassName('deleteOwner');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }
    
    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this Owner?")) {
            event.preventDefault();
        }
    }
    
    
    //-------------------------------------------------------------------------
    // TENANT EVENT LISTENER
    //-------------------------------------------------------------------------
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#createTenantForm'
    
    var createTenantForm = document.getElementById('createTenantForm');
    if (createTenantForm !== null) {
        createTenantForm.addEventListener('submit', validateTenantForm);
    }

    function validateTenantForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }
    
    //-------------------------------------------------------------------------
    // define an event listener for the '#editTenantForm'
    
    var editTenantForm = document.getElementById('editTenantForm');
    if (editTenantForm !== null) {
        editTenantForm.addEventListener('submit', validateTenantForm);
    }
    
    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteTenant' links
    var deleteLinks = document.getElementsByClassName('deleteTenant');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }
    
    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this Tenant?")) {
            event.preventDefault();
        }
    }

};