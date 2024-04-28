document.querySelector('.overlay').addEventListener('click', () => {
    document.querySelector('#fileInput').click();
 });
 
 document.querySelector('#fileInput').addEventListener('change', (e) => {
    const file = e.target.files[0];
    // Use FileReader to read the file and update the src of #profile-pic
    const reader = new FileReader();
    reader.onloadend = function() {
        document.querySelector('#profile-pic').src = reader.result;
        document.querySelector('#removeBtn').style.display = 'block';
    }
    reader.readAsDataURL(file);
 });
 
 document.querySelector('#removeBtn').addEventListener('click', () => {
     document.querySelector('#profile-pic').src = 'default.jpg';
     document.querySelector('#removeBtn').style.display = 'none';
 });