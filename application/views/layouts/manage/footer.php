<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright @ <b>Quick Corp</b> <?php echo Date('Y') ?></span>
    </div>
  </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
    $('.example1').DataTable();
    $('#example2').DataTable();
    $('.select-options').select2();
    <?php if ($this->uri->segment(2) == 'products' && $this->uri->segment(3) == 'update') { ?>
      var product_sub_category_id = <?php echo $product_details->product_sub_category_id ?>;
      $.post("<?php echo base_url(); ?>manage/product_sub_categorys/get_product_sub_category_id_selected/" + product_sub_category_id + '/' + $('#product_category_id').val(), function(obj) {
        $('#product_sub_category_id').html(obj);
      });
    <?php } ?>
  });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/js_tag/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
  $('#tags').tagsInput();
  CKEDITOR.replace('editor', {
    toolbar: 'MyToolbar',
    width: "100%",
    filebrowserBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html?type=Flash',
  });
  CKEDITOR.replace('editor1', {
    toolbar: 'MyToolbar',
    width: "100%",
    filebrowserBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html?type=Flash',
  });
  CKEDITOR.replace('editor2', {
    toolbar: 'MyToolbar',
    width: "100%",
    filebrowserBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>vendor/ckfinder/ckfinder.html?type=Flash',
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript">
  var JS_siteurl = '<?php echo base_url() ?>';
  $("#blog_tags").select2({
    tags: true
  });
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
</script>
<script type="text/javascript">
  $('#product_category_id').click(function() {
    $.post("<?php echo base_url(); ?>manage/product_sub_categorys/get_product_sub_category_id/" + $('#product_category_id').val(), function(obj) {
      $('#product_sub_category_id').html(obj);
    });
  });
  $(".popups").on('click', function() {
    var id = $(this).attr('data-id');
    var checkbox_value = "";
    $(this).each(function() {
      var ischecked = $(this).is(":checked");
      if (ischecked) {
        checkbox_value = "1";
      } else {
        checkbox_value = "0";
      }
    });
    window.location.href = JS_siteurl + "manage/popups/modal?popup_id=" + id + "&modal=" + checkbox_value;
  });
</script>

<!-- load footer current footer if exist -->
<?php
if (isset($pageFooter) && !empty($pageFooter)) {
  $this->load->view($pageFooter);
}
?>

<!-- function load image -->
<script>
  function readImageURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $(input).parent().find('.img-thumbnail').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $('.image-load').change(function() {
    readImageURL(this);
  });
</script>
<script src="<?= base_url(); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
</body>

</html>