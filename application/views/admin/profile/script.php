<?php
$user = $this->session->userdata('user');
extract($user);
?>

<script>
function loadData() {
  var data = <?php echo $id; ?>;
  $.ajax({
    url: '<?=base_url()?>Profile/getStaffData',
    method: 'GET',
    dataType: 'json',
    data: { data: data },
    async: false,
    success: function(data) {
      $('#username').text(data.username);
      $('#inputUsername').val(data.username);
      $('#created').text(data.created_at);
      $('#updated').text(data.updated_at);
    }
  });
}

window.addEventListener('load', loadData);

$(document).ready(function() {
  $('#settingsForm').submit(function(event) {
    event.preventDefault();
    
    var id = <?= $id ?>;
    var username = $('#inputUsername').val();
    var password = $('#inputPassword').val();
    
    var data = { id: id, username: username, password: password };
    var encryptedData = encryptData(data);
    
    $.ajax({
      url: '<?= base_url() ?>Profile/updateStaff',
      method: 'POST',
      data: { encryptedData: encryptedData }, 
      success: function(response) {
        $('#inputUsername').val('');
        $('#inputPassword').val('');

        var successMessage = $('<div class="alert alert-success">Settings saved successfully!</div>');
        $('#settings').append(successMessage);

        setTimeout(function() {
        successMessage.fadeOut('slow', function() {
            $(this).remove();
        });
        }, 2000);
        loadData();
      },
      error: function(xhr, status, error) {
        var Message = $('<div class="alert alert-danger">Settings Failed to save!</div>');
        $('#settings').append(Message);

        setTimeout(function() {
            Message.fadeOut('slow', function() {
            $(this).remove();
        });
        }, 2000);
      }
    });
  });

  function encryptData(data) {
    var encryptionKey = 'fef8cd2c5ef8f7af9f2ad665c5585388';
    var iv = '243ea241d148399c243ea241d148399c';

    var encryptedData = CryptoJS.AES.encrypt(JSON.stringify(data), CryptoJS.enc.Hex.parse(encryptionKey), { iv: CryptoJS.enc.Hex.parse(iv) });
    return encryptedData.toString();
  }
});


    
</script>
