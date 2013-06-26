<h1>Create a thread</h1>

<?php if($thread->hasError() || $comment->hasError()): ?>
<div class="alert alert-block">
    <h4 class="alert-heading">Validation Errors!</h4>
    <?php if(!empty($thread->validation_errors['title']['length'])): ?>
    <div>
        <strong><em>Title</em></strong> must be between
        <?php eh($thread->validation['title']['length'][1]) ?>
        and
        <?php eh($thread->validation['title']['length'][2]) ?>
        characters in length
    </div>
    <?php endif; ?>

    <?php if(!empty($comment->validation_errors['username']['length'])): ?>
    <div>
        <strong><em>Your name</em></strong> must be between
        <?php eh($comment->validation['username']['length'][1]) ?>
        and
        <?php eh($comment->validation['username']['length'][2]) ?>
        characters in length
    </div>
    <?php endif; ?>

    <?php if(!empty($comment->validation_errors['body']['length'])): ?>
    <div>
        <strong><em>Comment</em></strong> must be between
        <?php eh($comment->validation['body']['length'][1]) ?>
        and
        <?php eh($comment->validation['body']['length'][2]) ?>
        characters in length
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<form class="well" method="post" action="<?php eh(url('')) ?>">
    <label>Title</label>
    <input type="text" name="title" value="<?php eh(Param::get('title')) ?>" />
    <label>Your Name</label>
    <input type="text" name="username" value="<?php eh(Param::get('username')) ?>" />
    <label>Comment</label>
    <textarea name="body"><?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="page_next" value="create_end" />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>