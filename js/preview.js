// Get value from session storage

let receivedPreviewText = localStorage.getItem('preview-text');
let receivedPreviewTitle = localStorage.getItem('preview-title');

//let test = document.getElementById('preview-text');
//test.appendChild(receivedPreviewText);
document.getElementById('preview-title').textContent = receivedPreviewTitle;
document.getElementById('preview-text').textContent = receivedPreviewText;


