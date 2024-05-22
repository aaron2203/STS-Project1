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
