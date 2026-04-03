<script>
        var seePasWDIcon = document.querySelectorAll('.eye');
        seePasWDIcon.forEach(icon => {
            icon.onclick = () => {
                if (!icon.className.includes('fa-eye-slash')) {
                    icon.parentElement.querySelector('#password').setAttribute('type', 'password')
                    icon.className = 'fas fa-eye-slash'
                } else {
                    icon.parentElement.querySelector('#password').setAttribute('type', 'text')
                    icon.className = 'fas fa-eye'
                }
            }
        });
    </script>
</body>
</html>