function showRegisterForm() {
    $('.loginBox').fadeOut('fast', function() {
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast', function() {
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('FEEDBACK');
    });
    $('.error').removeClass('alert alert-danger').html('');

}

function showLoginForm() {
    $('#loginModal .registerBox').fadeOut('fast', function() {
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast', function() {
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('CONTACT US');
    });
    $('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal() {
    showLoginForm();
    setTimeout(function() {
        $('#loginModal').modal('show');
    }, 230);

}

function openRegisterModal() {
    showRegisterForm();
    setTimeout(function() {
        $('#loginModal').modal('show');
    }, 230);

}

$(document).ready(function() {

    console.log("hii");



    $("#Feedback").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: "required",


            msg: {
                required: true,
                minlength: 5,
                maxlength: 500
            }
        },
        // Specify validation error messages
        messages: {
            name: "Please enter your firstname",

            msg: {
                required: "Please enter a message",
                minlength: "Your message must be at least 5 characters long",
                maxlength: "Your message must be at least 500 characters long"
            },
        },
        errorClass: "text-danger",
        // showErrors: function(errorMap, errorList) {

        //   },

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            console.log("working")
                // form.preventDeafault();
            form.submit();
        }
    });

    $("#Contact").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: "required",



            msg: {
                required: true,
                minlength: 5,
                maxlength: 500
            },
            email: {
                required: true,
                email: true
            }


        },
        // Specify validation error messages
        messages: {
            name: "Please enter your firstname",

            msg: {
                required: "Please enter a message",
                minlength: "Your message must be at least 5 characters long",
                maxlength: "Your message must be at least 500 characters long"
            },
            email: "Please enter a valid email address"
        },
        errorClass: "text-danger",

        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            console.log("working")
                // form.preventDeafault();
            form.submit();
        }
    });

});

function contact(e) {
    /*   Remove this comments when moving to server */
    var text = $("#contact #name").val()

    /*   Simulate error message from the server   */
    shakeModal();
}


function feedback(e) {
    /*   Remove this comments when moving to server
    $.post( "/login", function( data ) {
            if(data == 1){
                           
            } else {
                 shakeModal(); 
            }
        });
    */

    /*   Simulate error message from the server   */
    shakeModal();
}

function shakeModal() {
    $('#loginModal .modal-dialog').addClass('shake');
    $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
    $('input[type="password"]').val('');
    setTimeout(function() {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}