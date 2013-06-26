<h1>Account Login</h1>

<?php
$userlength = $user->validation_errors['username']['length'];
$passlength = $user->validation_errors['password']['length'];

if(!empty($userlength) || !empty($passlength) || !empty($result)):
?>
<div class="alert alert-block">
    <h4 class="alert-heading">Login Failed</h4>
    <?php if(!empty($result)): ?>
    <div><?php eh($result) ?></div>
    <?php endif; ?>

    <?php if(!empty($userlength)): ?>
    <div>
        <strong><em>Username</em></strong> must be between
        <?php eh($userlength[1]) ?> and <?php eh($userlength[2]) ?>
        characters in length
    </div>
    <?php endif; ?>

    <?php if(!empty($passlength)): ?>
    <div>
        <strong><em>Password</em></strong> must be between
        <?php eh($passlength[1]) ?> and <?php eh($passlength[2]) ?>
        characters in length
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<form class="well" method="post" action="<?php eh(url('users/login')) ?>">
    <label>Username</label>
    <input type="text" name="username" value="<?php eh(Param::get('username')) ?>" />
    <label>Password</label>
    <input type="password" name="password" value="<?php eh(Param::get('password')) ?>" />
    <br />
    <input type="hidden" name="page_next" value="login_end" />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>