<div class="position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 9999">
  <div class="toast align-items-center text-white border-light" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body"></div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"></script>
<script src="<?= base_url('assets/js/main.js?v=') . time() ?>"></script>
<script type="text/javascript">
  var baseURL = "<?= base_url(); ?>";
  var toast = new bootstrap.Toast($('.toast'));
</script>
</body>

</html>