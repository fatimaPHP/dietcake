<h1>
    All threads
    <a class="btn btn-primary pull-right" href="<?php eh(url('thread/create')) ?>">Create</a>
</h1>
<ul>
    <?php foreach($threads as $v): ?>
    <li>
        <a href="<?php eh(url('thread/view',array('thread_id' => $v->id))) ?>">
        <?php eh($v->title) ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>