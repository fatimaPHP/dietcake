<h1><?php eh($thread->title) ?></h1>

<?php foreach($comments as $k => $v): ?>
<div class="comment">
    <div class="meta">
    <?php eh($v->id) ?>: <span class="text-info"><?php eh($v->username) ?></span> <?php eh($v->created) ?>
    </div>
    <div class="detail">
    <?php echo readable_text($v->body) ?>
    </div>
</div>
<?php endforeach; ?>

<?php echo "Comments: $total"; ?>

<?php if($pages > 1): ?>
    <div class="pagination pagination-centered">
        <ul>
        <?php for($i = 1; $i <= $pages; $i++): ?>
            <li <?php echo ($selected == $i) ? 'class="active"' : '' ?>>
                <a href="?thread_id=<?php eh($thread->id) ?>&page=<?php echo $i ?>&show=<?php eh($per_page) ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php endfor; ?>
        </ul>
    </div>
<?php endif; ?>
<hr />

<form class="well" method="post" action="<?php eh(url('thread/write')) ?>">
    <label>Your Name</label>
    <input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
    <label>Comment</label>
    <textarea name="body"><?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>" />
    <input type="hidden" name="page_next" value="write_end" />
    <button type="submit" class="btn btn-primary">Submit</button>
</form>