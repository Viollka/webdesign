
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<div class="container">
    <h3>Show User Form</h3>
    <form  action="?controller=users&action=edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$user['id']?>" />
        <div class="row">
            <div class="field">
                <label>Name: <input type="text" name="name" value="<?=$user['name']?>"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email" value="<?=$user['email']?>"><br></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Role Id <input type="text" name="role"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>
                    <input class="with-gap" type="radio" name="gender" <?php if ($user['gender']=='female'):?>checked<?php endif;?> value="female"/>
                    <span>Female</span>
                </label>
            </div>
            <div class="field">
                <label>
                    <input class="with-gap"  type="radio" name="gender" <?php if ($user['gender']=='male'):?>checked<?php endif;?> value="male"/>
                    <span>Male</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Photo</span>
                    <input type="file" name="photo"  accept="image/png, image/gif, image/jpeg">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" value="<?=$user['path_to_img']?>">
                </div>
            </div>
        </div>
        <input type="submit" class="btn" value="Edit">
    </form>
</div>

<style>
    body{
        padding-top: 3rem;
    }
    .container {
        max-width: 500px;
    }
</style>