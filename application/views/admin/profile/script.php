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

    var id = <?= $id?>;
    var username = $('#inputUsername').val();
    var password = $('#inputPassword').val();
  
    var encryptedData = opensslEncrypt(JSON.stringify({ id: id, username: username, password: password }));
  
    var data = {
      encryptedData: encryptedData
    };
  
    $.ajax({
      url: '<?=base_url()?>Profile/updateStaff',
      method: 'POST',
      data: data,
      success: function(response) {
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
});
function opensslEncrypt(data) {
  var encryptedData = '';
  $.ajax({
    url: '<?=base_url()?>Profile/opensslEncrypt',
    method: 'POST',
    data: { data: data },
    async: false, 
    success: function(response) {
      encryptedData = response;
    }
  });
  
  return encryptedData;
}

</script>
