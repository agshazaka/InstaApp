
<!-- Modal Edit Profile -->
<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container">
        <form class="mt-20 mb-20 needs-validation" id="form_edit_profile" action="<?php echo base_url('index.php/user/edit_profile/'.$user->username) ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Foto Profile</label>
            <br>
            <input type="file" name="foto_profile" id="foto_profile" aria-describedby="foto_profile">
            <small id="emailHelp" class="form-text text-muted">Format Foto .jpg</small>
            <input type="hidden" name="foto_profile_lama" value="<?php echo $user->foto_profile ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->email ?>">
          </div>
          <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="fullname" value="<?php echo $user->fullname ?>">
          </div>
          <div class="form-group">
            <label for="fullname">Tentang</label>
            <textarea class="form-control" name="tentang" id="tentang" cols="10" rows="3"><?php echo $user->tentang ?></textarea>
          </div>
          <br>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="username" value="<?php echo $user->username ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php echo $user->password ?>">
          </div>			
        
          </div>
      <div class="modal-footer">
          <button type="button" class="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="button">Sign Up</button>
          <!-- <button type="button" onclick="document.getElementById('form_signup').submit();" class="button">Sign Up</button> -->
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Post -->
<div class="modal fade" id="add_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container">
        <form class="mt-20 mb-20" id="form_add_post" action="<?php echo base_url('index.php/user/add_post/'.$user->username) ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="username" value="<?php echo $user->username ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Your Post</label>
            <br>
            <input type="file" name="file_post" id="file">
            <small id="emailHelp" class="form-text text-muted">Format Foto .jpg</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Caption</label>
            <textarea type="caption" name="caption" class="form-control" cols="10" rows="3"></textarea>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="button">Post</button>
          <!-- <button type="button" onclick="document.getElementById('form_signup').submit();" class="button">Sign Up</button> -->
        </form>
      </div>
    </div>
  </div>
</div>