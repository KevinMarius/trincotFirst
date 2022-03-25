<?php

namespace App\Table;

use Core\Table\Table;

class CommentTable extends Table {
    protected $table = 'comments';

    public function findWithPost($id) {
        return $this->query("SELECT comments.id, comments.from_user, comments.comment, comments.created_at, posts.name as posts FROM comments LEFT JOIN posts ON post_id = posts.id WHERE post_id=?", [$id]);
    }
    
}