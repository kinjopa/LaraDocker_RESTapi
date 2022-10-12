<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentApiResourse;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentApiController extends Controller
{
    /**
     * Вывод всех комментариев
     */
    public function getComment()
    {
        $posts = Comment::paginate(10);
        if(!empty($posts)){
            return CommentApiResourse::collection($posts->all());
        }
        return response()->json(['message' => 'Комментарии не найдены'], 404);
    }

    /**
     * Вывод комментария по user_id
     */
    public function getCommentById($user_id)
    {
        $post = Comment::all()->where('user_id', $user_id);

        if (empty($post->toArray()) || empty($user_id)) {
            return response()->json(['message' => 'Такого пользователя не существует'], 404);
        }

        return  CommentApiResourse::collection($post);
    }

    /**
     * Изменение статуса комментария
     */
    public function updateStatus(Request $request, $id)
    {
        if (!empty($request->status)) {
            $request->validate([
                'status' => 'required'
            ]);

            $post = Comment::find($id);

            if (!empty($post)) {
                $post->update([
                    'status' => $request->status
                ]);
                return response()->json(['message' => 'Update comment'], 200);
            }
        }
        return response()->json(['message' => 'Failed update'], 404);
    }

    /**
     * Удаление комментария
     */
    public function destroyComment($id)
    {
        if (!empty($id)) {
            $post = Comment::find($id);

            if (!empty($post)) {
                $post->delete();
                return response()->json(['message' => 'Delete comment'], 200);
            }
        }
        return response()->json(['message' => 'Failed Delete'], 404);
    }
}
