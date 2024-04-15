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
//document.querySelector('delete').addEventListener('click', checkPasswordMatch); 

let deleteBlogPosts = document.getElementsByClassName('delete-blogpost');
let confirmIt = function (e) {
    if (!confirm('Are you sure you want to delete this post?')) e.preventDefault();
};
for (var i = 0, l = deleteBlogPosts.length; i < l; i++) {
    deleteBlogPosts[i].addEventListener('click', confirmIt);
}

let deleteComments = document.getElementsByClassName('delete-comment');
for (var i = 0, l = deleteComments.length; i < l; i++) {
    deleteComments[i].addEventListener('click', confirmIt);
}