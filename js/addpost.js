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
    if (title === "" && text === "") {
        document.getElementById("post-title").style.backgroundColor = "lightcoral";
        document.getElementById("blog-text").style.backgroundColor = "lightcoral";
        e.preventDefault();
        window.alert("Looks like the title and text are empty!");
    } else if (title == "") {
        document.getElementById("post-title").style.backgroundColor = "lightcoral";
        e.preventDefault();
        window.alert("Looks like the title is empty!");
    } else if (text == "") {
        document.getElementById("blog-text").style.backgroundColor = "lightcoral";
        e.preventDefault();
        window.alert("Looks like the text is empty!");
    }
}

// code for clearing styling if the user enters text after alert
document.getElementById('post-title').addEventListener('input', clearStyle);
document.getElementById('blog-text').addEventListener('input', clearStyle);
function clearStyle(e) {
    e.target.style.backgroundColor = "white";
}