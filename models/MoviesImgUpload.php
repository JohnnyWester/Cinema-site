<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class MoviesImgUpload extends Model {
    public $image;

    public function rules()
    {
        return [
            ['image', 'required'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function uploadFile(UploadedFile $file) {

        $this->image = $file;
        return $this->saveImage();
    }

    public function updateImage(UploadedFile $file, $currentImage) {

        $this->image = $file;
        $this->deleteCurrentImage($currentImage);
        return $this->saveImage();
    }

    public function getFolder() {
        return Yii::getAlias('@web') . 'movies-images/';
    }

    public function generateFilename() {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage ($currentImage) {
        if ($this->fileExist($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileExist ($currentImage) {
        if(!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage() {

        $filename = $this->generateFilename();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }
}