function showComments(e) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword || (password === "" && confirmPassword === "")) {
        alert("Passwords do not match!");
        e.preventDefault();
        return false;
    }

    return true;
}

function addComment() {
    let commentSection = document.querySelector('.comment-section');
    commentSection.style.display = "block";
}

let commentSection = document.querySelector('.comment-section');
//document.querySelector('button').addEventListener('click', addComment);
window.alert(commentSection.display.style);
// Example usage:

//document.getElementById('comment-button').addEventListener('click', showHiddenContent); 


/*function viewComments() {
    let commentSection = document.querySelector('.comment-section');
    commentSection.display.style = "block";
}

function hideComments() {
    let commentSection = document.querySelector('.comment-section');
    commentSection.display.style = "none";
}

//let commentSection = document.querySelector('.comment-section');
document.querySelector('button').addEventListener('click', hideComments());

//document.getElementById('comment-button').addEventListener('click', showHiddenContent); 
*/