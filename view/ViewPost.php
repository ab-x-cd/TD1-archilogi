<?php
include_once "View.php";

class ViewPost extends View
{
    public function __construct($layout, $post)
    {
        parent::__construct($layout);

        $this->title= 'Exemple Annonces Basic PHP: Post';

        $this->content = '<h1>'.$post['title']. '</h1>';
        $this->content .= '<div class="date">'.$post['date'].'</div>';
        $this->content .= '<div class="body">'.$post['body'].'</div>';
    }
}
