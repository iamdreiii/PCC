<script>
function performBackup() {
  $.ajax({
    url: '<?=base_url()?>Backup/backup', // Replace with the actual URL for the backup operation
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      // Backup successful
      var downloadUrl = '<?=base_url()?>download_backup/' + response.filename;
      var downloadLink = document.createElement('a');
      downloadLink.href = downloadUrl;
      downloadLink.download = response.filename;
      downloadLink.click();
      var stat = "Database backup completed.\nLocation: C:/xampp/htdocs/INTERN/PCC/backup";
      success(stat);
    },
    error: function() {
      var stat =  "Failed to backup Database.";
      error(stat);
    }
  });
}


</script>
<?php $this->load->view('helpers/toastr');?>