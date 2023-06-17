<?php 
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script>
    Swal.fire(
    'Logout Berhasil!',
    'Session anda sudah berakhir!',
    'success'
    ).then((result) => {
        if (result.isConfirmed) {
            window.location = './';
        }else{
            window.location = './';
        }
    });
</script>
</html>