<?php

namespace App\Http\Controllers;

use App\Models\CSV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use Illuminate\Http\Response;

class CSVController extends Controller
{
    /**
     * csv import
     *
     */
    public function import(Request $request)
    {
        $path = 'images/Upload/csv';
        $name = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path($path), $name);
        $customerArr = $this->csvToArray('images/Upload/csv/'.$name);
        foreach ($customerArr as $importData) {
            $existPost = Post::where('title',trim($importData['title']))->exists();
          
            if (!$existPost) {
                $insertData = array(
                    "title"=>trim($importData['title']),
                    "description"=>trim($importData['description']),
                    "status" => $importData['status'],
                    "create_user_id" => $importData['create_user_id'],
                    "updated_user_id" => $importData['updated_user_id'],
                    "created_at" => now(),
                    "updated_at" => now());
                Post::insert($insertData);
                
            }

        }
    }

   

    /**
     * csv export
     *
     */
    public function export()
    {
        Log::info("aaaa");
        $fileName = 'posts.csv';
        $posts = DB::table('posts')
        ->join('users', 'posts.create_user_id', '=', 'users.id')
        ->orWhere('posts.status', '=', 1)
        ->select('posts.*', 'users.name')
        ->get();
       
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
    
        $columns = array('title', 'description', 'Posted User', 'Created Time');

        $callback = function () use ($posts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($posts as $post) {
                fputcsv($file, array($post->title, $post->description, $post->name, $post->created_at));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }
}
