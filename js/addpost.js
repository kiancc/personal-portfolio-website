document.getElementById('clear').addEventListener('click', clearPost); 

function clearPost(e) {
    // Clear the form fields
    const choice = window.confirm("Are you sure you want to clear?");

    if (choice) {
        document.getElementById("post-title").value = "";
        document.getElementById("blog-text").value = "";
    }
}

