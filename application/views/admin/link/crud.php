<script>
document.addEventListener('DOMContentLoaded', function() {
  
  fetch('Links/fetchlinks')
    .then(response => response.json())
    .then(data => {
      const { facebook, twitter, instagram, youtube, gmail } = data;
      document.getElementById('facebook').value = facebook || '';
      document.getElementById('twitter').value = twitter || '';
      document.getElementById('instagram').value = instagram || '';
      document.getElementById('youtube').value = youtube || '';
      document.getElementById('gmail').value = gmail || '';
    })
    .catch(error => console.error(error));
});
document.querySelector('.btn-primary').addEventListener('click', function() {
    const facebook = document.getElementById('facebook').value;
    const twitter = document.getElementById('twitter').value;
    const instagram = document.getElementById('instagram').value;
    const youtube = document.getElementById('youtube').value;
    const gmail = document.getElementById('gmail').value;

    fetch('Links/updateLinks', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `facebook=${facebook}&twitter=${twitter}&instagram=${instagram}&youtube=${youtube}&gmail=${gmail}`
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            document.getElementById('facebook').value = data.facebook || '';
            document.getElementById('twitter').value = data.twitter || '';
            document.getElementById('instagram').value = data.instagram || '';
            document.getElementById('youtube').value = data.youtube || '';
            document.getElementById('gmail').value = data.gmail || '';

            var stat = 'Link/s Updated';
            success(stat);
        } else {
            var stat = 'Update Failed';
            error(stat);
        }
    })
    .catch(error => console.error(error));
});

</script>
<?php $this->load->view('helpers/toastr');?>