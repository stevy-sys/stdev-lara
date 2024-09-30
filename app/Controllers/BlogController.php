<?php

namespace App\Controllers ;

use App\Models\Post;
use Stdev\Framework\Controller\Controller;

class BlogController extends Controller
{
    public function index()  {
        $post = new Post($this->db) ;
        $post = $post->all();
        // header('Content-Type: application/json'); // Définir le type de contenu à JSON
        echo json_encode(['post' => $post]); // Retourner les posts au format JSON
        // return $this->view('welcome',compact('post'));
    }

    public function show($id)  {
        // $req = $this->db->getPdo()->prepare("SELECT * FROM articles WHERE id = ?");
        // $message = $req->execute([$id])->fetch();

        $post = new Post($this->db);
        $post = $post->findById($id);


        return $this->view('single',compact('message'));
    }
}
