
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


<div class="container">
    <h3>Add New User</h3>
    <form action="?controller=users&action=add" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="field">
                <label>Name: <input type="text" name="name"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>E-mail: <input type="email" name="email"><br></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Password: <input type="password" name="password"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>Role Id: <input type="text" name="role"></label>
            </div>
        </div>
        <div class="row">
            <div class="field">
                <label>
                    <input class="with-gap" type="radio" name="gender" value="female"/>
                    <span>Female</span>
                </label>
            </div>
            <div class="field">
                <label>
                    <input class="with-gap"  type="radio" name="gender" value="male"/>
                    <span>Male</span>
                </label>
            </div>
        </div>
        <div class="row">
                      <div class="file-field input-field">
              <div class="btn">
                    <span>Photo</span>
                    <input name="photo" type="file" accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name ="filePath">
                </div>

           </div>
        </div>
        <input type="submit" class="btn" value="Add">
    </form>
</div>
</body>
</html>
