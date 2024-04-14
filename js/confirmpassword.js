function checkPasswordMatch(e) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword || (password === "" && confirmPassword === "")) {
        alert("Passwords do not match!");
        e.preventDefault();
        return false;
    }

    return true;
}

// Example usage:
document.getElementById('submit').addEventListener('click', checkPasswordMatch); 

function preventPasswordError(e) {
    window.alert("You clicked the submit button!");
    if (!checkPasswordMatch()) {
        e.preventDefault();
    }
}