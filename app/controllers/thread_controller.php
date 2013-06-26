<?php
class ThreadController extends AppController
{
    public function index()
    {
        $threads = Thread::getAll();

        $this->set(get_defined_vars());
    }

    public function view()
    {
        $default_page = 1;
        $items_per_page = 5;
        $default_size = 1;

        $thread = Thread::get(Param::get('thread_id'));

        $selected = (Param::get('page')) ? Param::get('page') : $default_page;
        $per_page = (Param::get('show')) ? Param::get('show') : $items_per_page;

        $total = $thread->countComments();
        $offset = ($selected - 1) * $per_page;

        if($total > $per_page) {
            $pages = ceil($total/$per_page);
        } else {
            $pages = $default_size;
        }

        $comments = $thread->getComments($offset,$per_page);

        $this->set(get_defined_vars());
    }

    public function create()
    {
        $thread = new Thread;
        $comment = new Comment;
        $page = Param::get('page_next','create');

        switch($page) {
            case 'create':
                break;
            case 'create_end':
                $thread->title = Param::get('title');
                $comment->username = Param::get('username');
                $comment->body = Param::get('body');
                try {
                    $thread->create($comment);
                } catch (ValidationException $e) {
                    $page = 'create';
                }
                break;
            default:
                throw new NotFoundException("{$page} not found");

        }
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function write()
    {
        $thread = Thread::get(Param::get('thread_id'));
        $comment = new Comment;
        $page = Param::get('page_next','write');

        switch($page) {
            case 'write':
                break;
            case 'write_end':
                $comment->username = Param::get('username');
                $comment->body = Param::get('body');
                try {
                    $thread->write($comment);
                } catch (ValidationException $e) {
                    $page = 'write';
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found.");
                break;
        }
        $this->set(get_defined_vars());
        $this->render($page);
    }
}
