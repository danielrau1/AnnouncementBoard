<?php

class Pages extends Controller{


    public function __construct(){


    }


    public function index(){

        $data = [
            'title'=>'AnnouncementBoard'

        ];

        $this->view('pages/index',$data);
    }





}
