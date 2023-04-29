<?php
  require 'view/header.php';
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Error</strong> No existe este recurso
</div>

<script>
  var alertList = document.querySelectorAll('.alert');
  alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
  })
</script>
<?php
  require 'view/footer.php';
?>