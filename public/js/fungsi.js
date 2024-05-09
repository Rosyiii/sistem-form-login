function gantiPassword(){
    const checkbox = document.getElementById('ganti_password');
    const form = document.getElementById('formPassword');

    if(checkbox.checked == true){
        form.style.display = 'block';
    }else{
        form.style.display = 'none';
    }
}