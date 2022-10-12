<footer>
    <div class="bg-dark p-3 text-white text-center position-fixed bottom-0 w-100 text-center">
        copyright &copy; 2022, Comrade Music | Designed by class 16
    </div>
</footer>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
    function showPass(btn,input){
       const button = document.getElementById(btn);
       const field = document.getElementById(input);

       if (field.type === "password") {
            field.type = 'text';
            button.classList.toggle('fa-eye-slash')
            button.classList.toggle('fa-eye')
       }else{
        field.type = 'password';
        button.classList.toggle('fa-eye-slash')
        button.classList.toggle('fa-eye')
       }
    }
</script>