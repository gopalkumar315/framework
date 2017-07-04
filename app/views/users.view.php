<?php require 'partials/head.php';?>
<ul>
    <?php foreach($users as $user):?>
        <li><?php echo $user->name;?></li>
    <?php endforeach;?>
</ul>
<form method="POST"  action="store">
    <input type="text" name="name">
</form>
<?php require 'partials/footer.php';?>