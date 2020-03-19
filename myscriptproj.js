//---Navbar Background of Jquery Starts Here
$(document).ready(function(){
  $(".mainnav").hover(function(){
    $(this).css("background-color", "white");$(this).css("color", "black");
  }, function(){
    $(this).css("background-color", "black");$(this).css("color", "white");
  })    
}); 
//---Navbar Background of Jquery Starts Ends
//------------------------------------------------------
//---Form Validation of JS Starts Here
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
//---Form Validation of JS Ends Here
//------------------------------------------------------
//---ConfirmPayment of JS Starts
function confirmPayment() {
    var atmCard;
    if (document.getElementById("visa").checked) {
        atmCard = document.getElementById("visa").value;
    } else if (document.getElementById("master").checked) {
        atmCard = document.getElementById("master").value;
    } else if (document.getElementById("amex").checked) {
        atmCard = document.getElementById("amex").value;
    }
    var CardNum = document.getElementById("inputCC").value.replace(/\D/g,'');
    var CardNumMasked = "XXXX XXXX XXXX " + CardNum.substring(12, 16);
    var confirmationText = "Hi " 
        + document.getElementById("inputFname").value + " "
        + document.getElementById("inputLname").value + " "
        + ", thanks for purchasing our product using " 
        + atmCard 
        + " with the Credit Card Number: " 
        + CardNumMasked 
        + ". We will email your receipt on " 
        + document.getElementById("inputEmail").value 
        + " and send the product to " 
        + document.getElementById("inputAddress").value + " " 
        + document.getElementById("inputAddress2").value + " " 
        + document.getElementById("inputCity").value + ", " 
        + document.getElementById("inputState").value + ", " 
        + document.getElementById("inputZip").value + ".";
    document.getElementById("paymentAccepted").innerHTML = confirmationText;
    $('#id_modal-payment-confirmation').modal('show');
}
//---ConfirmPayment of JS Ends
//------------------------------------------------------
//---Clear Input of Contact Us Starts
function myClr() {
            document.getElementById("myForm").reset();
        }
//---Clear Input of Contact Us Ends
//------------------------------------------------------

//Modal
// Get the modal
var modal = document.getElementById('confirmmodal');

// Get the button that opens the modal
var btn = document.getElementById("confirm");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

