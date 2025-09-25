<?php
echo "<script>
        window.onload = function() {
            if (!sessionStorage.getItem('popup_shown')) {
                alert('Ini hanya untuk proses pembelajaran.');
                // Tandai bahwa pop-up sudah ditampilkan selama sesi ini
                sessionStorage.setItem('popup_shown', 'true');
            }
            // Redirect ke halaman login setelah pop-up
            setTimeout(function() {
                window.location.href = 'auth/login.php'; // Arahkan ke halaman login
            }, 3000); // 3 detik setelah pop-up ditutup
        }
      </script>";
?>