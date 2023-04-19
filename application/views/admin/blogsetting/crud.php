<script>
document.addEventListener('DOMContentLoaded', function() {
  
  fetch('BlogSetting/fetchcolors')
    .then(response => response.json())
    .then(data => {
      const { navbar_color, body_color, footer_color } = data;
      document.getElementById('navbar_color').value = navbar_color || '';
      document.getElementById('body_color').value = body_color || '';
      document.getElementById('footer_color').value = footer_color || '';
    })
    .catch(error => console.error(error));
});
document.querySelector('#saveBtncolor').addEventListener('click', function() {
    const navbar_color = document.getElementById('navbar_color').value;
    const body_color = document.getElementById('body_color').value;
    const footer_color = document.getElementById('footer_color').value;

    fetch('BlogSetting/updatecolor', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `navbar_color=${navbar_color}&body_color=${body_color}&footer_color=${footer_color}`
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            document.getElementById('navbar_color').value = navbar_color || '';
            document.getElementById('body_color').value = body_color || '';
            document.getElementById('footer_color').value = footer_color || '';
            success('Color/Theme Updated');
        } else {
            error('Failed to Update theme/color');
        }
    })
    .catch(error => console.error(error));
});

</script>

<!-- BLOG DETAILS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  
  fetch('BlogSetting/fetchblogdetails')
    .then(response => response.json())
    .then(data => {
      const { title, subtitle, footer } = data;
    //   document.getElementById('title').value = title || '';
    //   document.getElementById('subtitle').value = subtitle || '';
    //   document.getElementById('footer').value = footer || '';
      $('textarea[name="title"]').summernote('code', title);
      $('textarea[name="subtitle"]').summernote('code', subtitle);
      $('textarea[name="footer"]').summernote('code', footer);
    })
    .catch(error => console.error(error));
});
document.querySelector('#saveBtndetails').addEventListener('click', function() {
    const title = document.getElementById('title').value;
    const subtitle = document.getElementById('subtitle').value;
    const footer = document.getElementById('footer').value;

    fetch('BlogSetting/updateblogdetails', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `title=${title}&subtitle=${subtitle}&footer=${footer}`
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            document.getElementById('title').value = title || '';
            document.getElementById('subtitle').value = subtitle || '';
            document.getElementById('footer').value = footer || '';
            success('Detais Updated');
        } else {
            error('Failed to Update details');
        }
    })
    .catch(error => console.error(error));
});

</script>


<!-- BLOG LINKS TOGGLE -->
<script>
// get toggle elements by name
var facebookToggle = document.getElementsByName("facebook")[0];
var twitterToggle = document.getElementsByName("twitter")[0];
var instagramToggle = document.getElementsByName("instagram")[0];
var youtubeToggle = document.getElementsByName("youtube")[0];

// make AJAX call to get social media status
var xhr = new XMLHttpRequest();
xhr.open('GET', '<?=base_url()?>BlogSetting/get_status');
xhr.onload = function() {
    if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        // set toggle states
        facebookToggle.checked = response.facebook == 1;
        twitterToggle.checked = response.twitter == 1;
        instagramToggle.checked = response.instagram == 1;
        youtubeToggle.checked = response.youtube == 1;
    }
    else {
        console.log('Request failed. Returned status of ' + xhr.status);
    }
};
xhr.send();

// add change event listener to toggle elements
document.querySelectorAll('input[type="checkbox"]').forEach(function(el) {
    el.addEventListener('change', function() {
        var isChecked = this.checked;
        var socialMedia = this.name;

        // make AJAX call to update social media status
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?=base_url()?>BlogSetting/update_status');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                //console.log(xhr.responseText);
                if(isChecked){
                  success('Blog Link Enabled');
                }else{
                  success('Blog Link Disabled');
                }
            }
            else {
                //console.log('Request failed. Returned status of ' + xhr.status);
                success('Failed to update');
            }
        };
        xhr.send('social_media=' + socialMedia + '&is_checked=' + isChecked);
    });
});

</script>
<?php $this->load->view('helpers/toastr');?>