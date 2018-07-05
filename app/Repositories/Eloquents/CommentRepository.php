<?php
/**
 * Created by PhpStorm.
 * User: windd01
 * Date: 01/02/2018
 * Time: 10:14
 */

namespace App\Repositories\Eloquents;
use App\Models\Admin\Comment;
use App\Repositories\CommentRepositoryInterface;


class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getBlankModel()
    {
        return new Comment();
    }

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}