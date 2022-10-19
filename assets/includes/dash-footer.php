<script src="../assets/js/bootstrap5.bundle.min.js"></script>
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

    const msg = document.querySelector('#msg');

    if (msg) {
        setTimeout(() => {
            msg.classList.add('animate__fadeOutRight');
            setTimeout(() => {
                msg.classList.add('d-none');
            }, 2000);
        }, 3000);
    }
</script>

<style>
    #msg{
        position: fixed;
        top: 20%;
        right: 30px;
        z-index: 9999 !important;
    }
</style>