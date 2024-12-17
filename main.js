const signInButton = document.getElementById('sign_in');
const signUpButton = document.getElementById('sign_up');
const FormSignUp = document.getElementById('FormSignUp');
const FormSignIn = document.getElementById('FormSignIn');

signInButton.addEventListener('click', () => {
    FormSignIn.classList.remove('hidden'); 
    FormSignUp.classList.add('hidden');  
});
signUpButton.addEventListener('click', () => {
    FormSignUp.classList.remove('hidden'); 
    FormSignIn.classList.add('hidden');  
});
