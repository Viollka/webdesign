
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<div class="container">
    <div class="row">
        <table>
            <?php foreach ($users as $user):?>
			
			<?php
				$imurl =  !empty($user['path_to_img'])? $user['path_to_img']:'public/uploads/test.jpg'
			?>
             <tr>
                <td><a href="?controller=users&action=show&id=<?=$user['id']?>"><?php echo $user['id']?></a></td>
                <td><?=$user['name']?></td>
                <td><?=$user['email']?></td>
                <td><?=$user['id_role']?></td>
                <td><?=$user['gender']?></td>
                <td><img src = '<?=$imurl?>' height='50px'></td>
                <td><a href="?controller=users&action=delete&id=<?=$user['id']?>" >X</a></td>
             </tr>
            <?php endforeach;?>
        </table>
    </div>
    <a class="btn" href="?controller=users&action=addForm">add new user</a>
    <a class="btn" href="?controller=index">return back</a>
</div>

<style>

    body {
        padding-top: 3rem;
    }

    .container {
        max-width: 500px;
    }
</style>
