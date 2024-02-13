
var pseudoInput = document.getElementById("pseudo");
var emailInput = document.getElementById("email");
var sujetInput = document.getElementById("sujet");
var messageInput = document.getElementById("message");

pseudoInput.addEventListener("input", function() {
    var pseudo = pseudoInput.value;
    if (pseudo == "") {
        document.getElementById("pseudo-error").innerHTML = "Veuillez entrer votre pseudo";
    } else {
        document.getElementById("pseudo-error").innerHTML = "";
    }
});

emailInput.addEventListener("input", function() {
    var email = emailInput.value;
    if (email == "") {
        document.getElementById("email-error").innerHTML = "Veuillez entrer votre email";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("email-error").innerHTML = "Veuillez entrer un email valide";
    } else {
        document.getElementById("email-error").innerHTML = "";
    }
});

sujetInput.addEventListener("input", function() {
    var sujet = sujetInput.value;
    if (sujet == "") {
        document.getElementById("sujet-error").innerHTML = "Veuillez entrer le sujet de votre message";
    } else {
        document.getElementById("sujet-error").innerHTML = "";
    }
});

messageInput.addEventListener("input", function() {
    var message = messageInput.value;
    if (message == "") {
        document.getElementById("message-error").innerHTML = "Veuillez entrer votre message";
    } else {
        document.getElementById("message-error").innerHTML = "";
    }
});

function validateForm() {
    var pseudo = pseudoInput.value;
    var email = emailInput.value;
    var sujet = sujetInput.value;
    var message = messageInput.value;
    var error = false;

    // Vérifiez que le champ pseudo n'est pas vide
    if (pseudo == "") {
        document.getElementById("pseudo-error").innerHTML = "Veuillez entrer votre pseudo";
        error = true;
    } else {
        document.getElementById("pseudo-error").innerHTML = "";
    }

    // Vérifiez que le champ email est un email valide
    if (email == "") {
        document.getElementById("email-error").innerHTML = "Veuillez entrer votre email";
        error = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("email-error").innerHTML = "Veuillez entrer un email valide";
        error = true;
    } else {
        document.getElementById("email-error").innerHTML = "";
    }

    // Vérifiez que le champ sujet n'est pas vide
    if (sujet == "") {
        document.getElementById("sujet-error").innerHTML = "Veuillez entrer le sujet de votre message";
        error = true;
    } else {
        document.getElementById("sujet-error").innerHTML = "";
    }

    // Vérifiez que le champ message n'est pas vide
    if (message == "") {
        document.getElementById("message-error").innerHTML = "Veuillez entrer votre message";
        error = true;
    } else {
        document.getElementById("message-error").innerHTML = "";
    }

    return !error;
}

