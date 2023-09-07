function sendEmail(){
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "shadrachadwar@gmail.com",
        Password : "4D7B7CDFBACE93B39DC7E3284DFBF0033C11",
        From : "shadrachadwar@gmail.com",
        // To :document.getElementById("usermail").value,
        To : 'nirachtect120@gmail.com',
        Subject : "This is the subject",
        Body : "And this is the body"
    }).then(
      message => alert(message)
    );
}