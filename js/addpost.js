// code for clearing the add blog form
document.getElementById('clear').addEventListener('click', clearPost); 
function clearPost(e) {
    // Clear the form fields
    const choice = window.confirm("Are you sure you want to clear?");

    if (choice) {
        document.getElementById("post-title").value = "";
        document.getElementById("blog-text").value = "";
    }
}

// code for preventing submission of empty blog form
document.getElementById('submit').addEventListener('click', preventEmptyPost); 
function preventEmptyPost(e) {
    const title = document.getElementById("post-title").value;
    const text = document.getElementById("blog-text").value;
    if (title === "" || text === "") {
        e.preventDefault();
        window.alert("Looks like the blog is empty!");
    }
}