<?php


class ImageUpload
{

    private $file,
        $fileName,
        $fileExtension,
        $fileSize,
        $extension,
        $maxSize,
        $sourcePath,
        $error;
    private $uploadErrors = false;


        /**
         * constructor of ImageUpload 
         * @return void
         */
    public function __construct()
    {
        $this->targetDir = ROOT . "/assets/img/";

        $this->extension = [
            "jpeg",
            "jpg",
            "png",
            "gif",


        ];
        $this->maxSize = 150000;
        $this->targetPath = ROOT . "/assets/img/";
    }

     /**
         * Undocumented function
         *
         * @param array $file
         * @return void
     */

    public function load(array $file)
    {
        $this->file = $file;
        $this->fileName = $file['photo']['name'];
        $this->fileType = $file['photo']['type'];
        $this->fileSize = $file['photo']['size'];
        $this->sourcePath = $file['photo']['tmp_name'];
        $this->error = $file['photo']['error'];

        $this->fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        return $this;
    }
    /**
     * check size of upload photo 
     *
     * @return boolean
     */
    private function checkMaxSize()
    {
        if ($this->fileSize < $this->maxSize) {
            return true;
        }
        $this->uploadErrors[] = 'The size of the picture exceeds 150 kb';
        return false;
    }
     /**
      * check extensions of upload file 
      *
      * @return boolean
      */
    private function checkExtensions()
    {
        if (in_array($this->fileExtension, $this->extension)) {
            return true;
        }
        $this->uploadErrors[] = 'There are no such extensions for the picture';
        return false;
    }

    /**
     * upload photo move  from tmp directory to target diretory
     *
     * @param integer $userId
     * @return void
     */
    public function upload(int $userId)
    {
        $this->checkMaxSize();
        $this->checkExtensions();
        if (($this->uploadErrors == false && ($this->error == 0))) {
            $result =  move_uploaded_file($this->sourcePath, $this->targetPath . $this->fileName);
            if ($result == true) {
                $image_path = "/assets/img/" . $this->fileName;
                return  Users::uploadPhoto($userId, $image_path);
            }
        }
        return false;
    }
    public function getErrors()
    {
        return $this->uploadErrors;
    }
}
