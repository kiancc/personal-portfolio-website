// Get value from session storage

let receivedPreviewText = localStorage.getItem('preview-text');
let receivedPreviewTitle = localStorage.getItem('preview-title');

//let test = document.getElementById('preview-text');
//test.appendChild(receivedPreviewText);
document.getElementById('preview-title').textContent = receivedPreviewTitle;
document.getElementById('preview-text').textContent = receivedPreviewText;




const button = document.getElementById('edit-button');


// code to redirect to preview page and sends title and text
// ----------------------------
function redirectToPage() {
    window.location.href = 'addpost.php';
}

button.addEventListener('click', redirectToPage);