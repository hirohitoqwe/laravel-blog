<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\UserLike;

class CalculateService
{
    public function getUserCount(): int
    {
        return count(User::all());
    }

    public function getCommentCount(): int
    {
        return count(Comment::all());
    }

    public function getPostCount(): int
    {
        return count(Post::all());
    }

    public function mostPopularPost(): Post
    {
        $posts = Post::all();
        $popularPost = "Все посты одинаковые";
        $maxCoverage = 0;
        foreach ($posts as $post) {
            $currentCoverage = count(Comment::where('post_id', $post->id)->get()) + count(UserLike::where('post_id', $post->id)->get());
            if ($currentCoverage > $maxCoverage) {
                $maxCoverage = $currentCoverage;
                $popularPost = $post;
            }
        }

        return $popularPost;

    }


}
