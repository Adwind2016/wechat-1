<?php

namespace App\Http\Controllers;


use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public $material;

    /**
     * MateriaController constructor.
     * @param $material
     */
    public function __construct(Application $material)
    {
        $this->material = $material->material;
    }

    public function image()
    {
        $image =$this->material->uploadImage(public_path().'/images/1.jpg');
        return $image;
    }
    public function audio()
    {
        $audio->$this->material->uploadVoice(public_path().'/images/song.mps');
        return $audio;
    }
    public function materials()
    {
        $images->$this->material->lists('image');
        return $images;
    }
}
