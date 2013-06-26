<h1>Create an Account</h1>

<?php if($user->hasError()): ?>
<div class="alert alert-warning">
    <h4 class="alert-heading">Validation Error</h4>
    <?php if(!empty($user->validation_errors['username']['length'])): ?>
    <div>
        <strong><em>Your Name</em></strong> must be between
        <?php eh($user->validation['username']['length'][1]) ?> and
        <?php eh($user->validation['username']['length'][2]) ?> characters in length
    </div>
    <?php endif; ?>

    <?php if($user->validation_errors['username']['unique']): ?>
    <div>
        The name <strong><em><?php eh(Param::get('username')) ?></em></strong> is already taken.
    </div>
    <?php endif; ?>

    <?php if(!empty($user->validation_errors['password']['length'])): ?>
    <div>
        <strong><em>Password</em></strong> must be between
        <?php eh($user->validation['password']['length'][1]) ?> and
        <?php eh($user->validation['password']['length'][2]) ?> characters in length
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<form class="well" method="post" action="<?php eh(url('users/create')) ?>">
    <label>Your Name</label>
    <input type="text" name="username" value="<?php eh(Param::get('username')) ?>" />
    <label>Password</label>
    <input type="password" name="password" value="<?php eh(Param::get('password')) ?>" />
    <br />
    <input type="hidden" name="page_next" value="create_end" />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>