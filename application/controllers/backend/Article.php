<?php

use Orm\Post;

class Article extends MY_Controller{

    public function form(){
        $notif = '';

        if($this->input->post()){
            $title = $this->input->post('title');
            $article = $this->input->post('article');

            if($title == '' || $article == ''){
                $notif = 'Title dan Article harus diisi ya :v';
            }else{
            $post = new Post();
            $post->title = $title;
            $post->article = $article;
            $post->save();
            $notif = 'Title dan Article anda berhasil ditambahkan :)';
            }
        }

        view('backend.Article.form', ['notif' => $notif]);
    }

    public function list(){

        $post_list = Post::all();

        $flashdata = $this->session->flashdata();

        view('backend.Article.list', ['post_list' => $post_list, 'flashdata' => $flashdata]);
    }

    public function hapus($id){
        $post = Post::find($id);
        $post->delete();

        $this->session->set_flashdata('notif', 'Selamat!!! Data anda berhasil dihapus >,<');
        redirect('backend/article/list');
    }

    public function ubah($id){

        $notif = '';

        $post = Post::find($id);
        if($this->input->post()){        
            $title = $this->input->post('title');
            $article = $this->input->post('article');

            if($title == '' || $article == ''){
                $notif = 'Title dan Article harus diisi ya :v';
            }else{
            $post->title = $title;
            $post->article = $article;
            $post->save();
            $notif = 'Title dan Article anda berhasil diubah :)';
            }

        }
        view('backend.Article.form', ['notif' => $notif, 'post' => $post]);
    }
}