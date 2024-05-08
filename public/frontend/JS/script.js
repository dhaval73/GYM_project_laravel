const hamburger = $(".hamburger");
const navLinks = $(".nav-links");
const links = $(".nav-links li ");
const hamburgerclose = $(".nav-links li");

hamburger.click(() => {
    //Animate Links
    navLinks.toggleClass("open");
    links.each(function () {
        $(this).toggleClass("fade");
    });


    //Hamburger Animation
    hamburger.toggleClass("toggle");
});

// on click link 
// hamburgerclose.click(() => {
//     navLinks.css({ "display": "flex" });
//     hamburger.toggleClass("toggle")
//     navLinks.toggleClass("open")
//     links.each(function () {
//         $(this).toggleClass("fade");
//     });
// })


var prevScrollpos = window.pageYOffset;
console.log(prevScrollpos);
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    console.log(currentScrollPos);
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0px";
    } else {
        document.getElementById("navbar").style.top = String(1.5 * (-$("#navbar").height())) + "px";
    }
    prevScrollpos = currentScrollPos;
}

// $(document).ready(function () {
//     jQuery.validator.addMethod("lettersonly", function (value, element) {
//         return this.optional(element) || /^[a-z\s]+$/i.test(value);
//     });
//     $("#register").validate({
//         rules: {
//             'fname': {
//                 required: true,
//                 minlength: 2,
//                 maxlength: 15,
//                 lettersonly: true
//             },
//             'lname': {
//                 required: true,
//                 minlength: 2,
//                 maxlength: 15,
//                 lettersonly: true
//             },
            
//             'mo_no': {
//                 required: true,
//                 number: true,
//                 minlength: 10,
//                 maxlength: 10,
//             },
//             'date':{
//                 date:true,
//             },
//             'email': {
//                 required: true,
//                 email: true,
//                 maxlength: 30,
//             },
//             'pass': {
//                 required: true,
//                 minlength: 7,
//                 maxlength: 14,
//             },
//         },
//         messages: {
//             'fname': {
//                 'required': "First name required.",
//                 'minlength': "it should have atlist 2 character",
//                 'maxlength': "it should have max 15 character",
//                 'lettersonly': "Special charecter and number not allowed"
//             },
//             'lname': {
//                 'required': "Last name required",
//                 'minlength': "it should have atlist 2 character",
//                 'maxlength': "it should have max 15 character",
//                 'lettersonly': "Special charecter and number not allowed"
//             },
//             'date':{
//                 'date':"it shoud be date"
//             },
           
//             'mo_no': {
//                 'required': "Mobile Number is required",
//                 'number': "it should be Numbers only",
//                 'minlength': "Mobile Number should be of 10 Digit",
//                 'maxlength': "Mobile Number should be of 10 Digit",
//             },
//             'email': {
//                 'required': "Email is required",
//                 'maxlength': "Email should have max 30 character",
//             },
//             'pass': {
//                 'required': "Email is required",
//                 'minlength': "Password should have atlist 7 character",
//                 'maxlength': "Password should have max 14 character",
//             },
//         }
//     });
// });

// $(document).ready(function () {
//     $("#login").validate({
//         rules: {
//             'email': {
//                 required: true,
//                 email: true,
//                 maxlength: 30,
//             },
//             'pass': {
//                 required: true,
//                 minlength: 7,
//                 maxlength: 14,
//             },
//         },
//         messages: {
//             'email': {
//                 'required': "Email is required",
//                 'maxlength': "it should have max 30 character",
//             },
//             'pass': {
//                 'required': "Password is required",
//                 'minlength': "Passsword should have atlist 7 character",
//                 'maxlength': "Passsword should have max 14 character",
//             },
//         }
//     });
// });



// function Messagesent(name) {
//     $('.demo').html(name);
//     $('.demo').toggleClass("demodispaly");
// }
// setTimeout(() => {
//     Messagesent('Message send successful');
// }, 1000);
// setTimeout(() => {
//     Messagesent('');
// }, 8000);