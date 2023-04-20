<style>
.create-post {
  background-color: #fff;
  border: 1px solid #dddfe2;
  border-radius: 8px;
  box-shadow: 0px 1px 3px rgba(0,0,0,0.1);
  padding: 12px;
  margin-bottom: 24px;
}

.create-post-header {
  display: flex;
  align-items: center;
  margin-bottom: 8px;
}

.create-post-avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 12px;
}

.create-post-username {
  font-size: 16px;
  font-weight: 600;
  color: #1877f2;
}

#post-form {
  display: flex;
  flex-direction: column;
}

#post-text {
  border: none;
  resize: none;
  font-size: 18px;
  line-height: 24px;
  margin-bottom: 12px;
}

.post-options {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}

.media-input {
  display: flex;
  align-items: center;
}

.media-input input[type=file] {
  display: none;
}

.media-input label {
  cursor: pointer;
  display: flex;
  align-items: center;
  font-size: 14px;
  color: #1877f2;
  margin-right: 12px;
}

.tagged-users-input input[type=text] {
  border: none;
  font-size: 14px;
  padding: 4px;
  border-bottom: 1px solid #dddfe2;
}

.audience-input select {
  border: none;
  font-size: 14px;
  padding: 4px;
  background-color: transparent;
  color: #1877f2;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
}

.audience-input select:focus {
  outline: none;
}

.post-buttons {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

#post-button {
  background-color: #1877f2;
  color: #fff;
  border: none;
  padding: 8px 16px;
  font-size: 14px;
  font-weight: 600;
  border-radius: 9999px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

#post-button:hover {
  background-color: #166fe5;
}

#cancel-button {
  background-color: transparent;
  border: none;
  color: #757575;
  font-size: 14px;
  cursor: pointer;
  transition: color 0.2s ease-in-out;
}

#cancel-button:hover {
  color: #000;
}
#create-post-modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

#create-post-modal-content {
  background-color: white;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
  max-width: 700px;
}

#create-post-modal-close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

#create-post-modal-close:hover,
#create-post-modal-close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.create-post-container {
  margin-top: 10px;
}

.create-post-header {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.create-post-header img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}

#create-post-form textarea {
  width: 100%;
  height: 100px;
  border: none;
}

</style>
<button id="create-post-button">Create Post</button>

<div id="create-post-modal">
  <div id="create-post-modal-content">
    <span id="create-post-modal-close">&times;</span>
    <div class="create-post-container">
      <div class="create-post-header">
        <img src="https://via.placeholder.com/50x50" alt="User Avatar">
        <h4>User Name</h4>
      </div>
      <form id="create-post-form">
        <textarea id="post-text" placeholder="What's on your mind?"></textarea>
        <div class="post-options">
          <div class="media-input">
            <input type="file" id="post-media" multiple>
            <label for="post-media">
              <i class="fa fa-camera"></i> Photo/Video
            </label>
          </div>
          <div class="tagged-users-input">
            <input type="text" id="post-tagged-users" placeholder="Tag Friends">
          </div>
          <div class="audience-input">
            <select id="post-audience">
              <option value="public">Public</option>
              <option value="friends">Friends</option>
              <option value="custom">Custom</option>
            </select>
          </div>
        </div>
        <div class="post-buttons">
          <button type="submit" id="post-button">Post</button>
          <button type="button" id="cancel-button">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
const createPostButton = document.getElementById("create-post-button");
const createPostModal = document.getElementById("create-post-modal");
const closeModalButton = document.getElementById("create-post-modal-close");

createPostButton.addEventListener("click", () => {
  createPostModal.style.display = "block";
});

closeModalButton.addEventListener("click", () => {
  createPostModal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target == createPostModal) {
    createPostModal.style.display = "none";
  }
});

</script>