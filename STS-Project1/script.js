$(document).ready(function() {
    $('#name').on('keypress', function() {
        $('#nametooltip').css('opacity', '1');
        $('#emailtooltip').css('opacity', '0'); // Hide email tooltip if it was visible
    });

    $('#email').on('keypress', function() {
        $('#emailtooltip').css('opacity', '1');
        $('#nametooltip').css('opacity', '0'); // Hide name tooltip if it was visible
    });

    $('#name').on('blur', function() {
        $('#nametooltip').css('opacity', '0');
    });

    $('#email').on('blur', function() {
        $('#emailtooltip').css('opacity', '0');
    });
    
});
//name validation
var user=document.querySelector("#name");
user.addEventListener("input", function() {
    const inputVal = user.value;
    const charValid = /^[a-zA-Z ]*$/.test(inputVal);
    if (inputVal.length <= 30) {
        $('.maxlen').addClass('active');
    } else {
        $('.maxlen').removeClass('active');
    }

    if (charValid) {
        $('.charonly').addClass('active');
    } else {
        $('.charonly').removeClass('active');
    }

    if (numValid) {
        $('.numonly').addClass('active');
    } else {
        $('.numonly').removeClass('active');
    }
});


// Email validation function
function isValidEmail(email) {
    // Regular expression for email validation
    const emailPattern = /^[^\s@]+@[^\s]+\.[^\s]+$/;
    return emailPattern.test(email);
}

$(document).ready(function() {
    $('#email').on('input', function() {
        const inputVal = $(this).val();
        const isValid = isValidEmail(inputVal);
        if (isValid) {
            $('.emailonly').addClass('active');
        } else {
            $('.email').removeClass('active');
        }
    });
});

// validation

$(document).ready(function() {
    $('#password').on('keypress', function() {
        $('#passwordTooltip').css('opacity', '1');
    });

    $('#password').on('blur', function() {
        $('#passwordTooltip').css('opacity', '0');
    });

    $('#password').on('input', function() {
        validatePassword();
    });

    $('#signupForm').on('submit', function(event) {
        event.preventDefault();
        if (validatePassword()) {
            $('#successMessage').text('Sign-up successful!').show();
            $('#errorMessage').hide();
        } else {
            $('#errorMessage').text('Please fix the errors in the form.').show();
            $('#successMessage').hide();
        }
    });

    function validatePassword() {
        const password = $('#password').val();
        let isValid = true;

        if (password.length >= 8) {
            $('.minlen').addClass('active').removeClass('invalid');
        } else {
            $('.minlen').removeClass('active').addClass('invalid');
            isValid = false;
        }

        if (/[A-Z]/.test(password)) {
            $('.upper').addClass('active').removeClass('invalid');
        } else {
            $('.upper').removeClass('active').addClass('invalid');
            isValid = false;
        }

        if (/[a-z]/.test(password)) {
            $('.lower').addClass('active').removeClass('invalid');
        } else {
            $('.lower').removeClass('active').addClass('invalid');
            isValid = false;
        }

        if (/[0-9]/.test(password)) {
            $('.num').addClass('active').removeClass('invalid');
        } else {
            $('.num').removeClass('active').addClass('invalid');
            isValid = false;
        }

        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            $('.special').addClass('active').removeClass('invalid');
        } else {
            $('.special').removeClass('active').addClass('invalid');
            isValid = false;
        }

        return isValid;
    }
});



