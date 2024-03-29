<?php


namespace App\Traits;

use VideoThumbnail;

trait GenericClassWithMedia
{
    public function get_folder_images ()
    {
        $folder = '';
        if (isset($this->folder_images)) $folder = @$this->folder_images;
        return $folder;
    }

    public function get_folder_videos ()
    {
        $folder = '';
        if (isset($this->folder_videos)) $folder = $this->folder_videos;
        return $folder;
    }

    public function get_folder_pdf ()
    {
        $folder = '';
        if (isset($this->folder_pdf)) $folder = $this->folder_pdf;
        return $folder;
    }

    public function get_images_attr ()
    {
        $attr = [];
        if (isset($this->images_attr)) $attr = @$this->images_attr;
        return $attr;
    }

    public function get_videos_attr ()
    {
        $attr = [];
        if (isset($this->videos_attr)) $attr = @$this->videos_attr;
        return $attr;
    }

    public function get_pdf_attr ()
    {
        $attr = [];
        if (isset($this->pdf_attr)) $attr = @$this->pdf_attr;
        return $attr;
    }

    public static function createDataWithMedia ($fields = null)
    {
        $model = new self();
        $fields = (isset($fields)) ? $fields : request ()->except ('_token');

        if (isset(request ()->files) && count (request ()->files) > 0) {
            if ($model->get_images_attr () != []) {
                $folder = $model->get_folder_images ();
                foreach ($model->get_images_attr () as $image) {
                    if ($_FILES[$image] && $_FILES[$image]['name'] != '') {
                        $names = saveImage (request ()[$image], $folder);
                        foreach ($names as $x) {
                            $fields[$image] = $x;
                        }
                    } else {
                        $fields[$image] = '';
                    }
                }
                $model = self::create ($fields);
                return $model;
            }
            if ($model->get_videos_attr () != []) {
                var_dump ("video");
                $folder_videos = $model->get_folder_videos ();
                foreach ($model->get_videos_attr () as $video) {
                    if ($_FILES[$video] && $_FILES[$video]['name'] != '') {
                        $fields[$video] = saveVideo (request ()[$video], $folder_videos);
                        $thumbnail = VideoThumbnail::createThumbnail (request ()[$video]->getPathName (), public_path ("videos/video_thumbnail"), $fields[$video] . '.jpg', 2, 600, 600);
                        $fields['image_video'] = $fields[$video] . '.jpg';
                    } else {
                        $fields[$video] = '';
                    }
                }
                return $model = self::create ($fields);
            }
            if ($model->get_pdf_attr () != []) {
                $folder_pdf = $model->get_folder_pdf ();
                foreach ($model->get_pdf_attr () as $pdf) {
                    if ($_FILES[$pdf] && $_FILES[$pdf]['name'] != '') {
                        $fields[$pdf] = savePdf (request ()[$pdf], $folder_pdf);
                    } else {
                        $fields[$pdf] = '';
                    }
                }
                return $model = self::create ($fields);
            }
        } else {
            return $model = self::create ($fields);
        }
    }

    public static function updateDataWithMedia ($id, $fields = null)
    {
        $model = self::find ($id);
        $fields = (isset($fields)) ? $fields : request ()->except ('_token');

        if (isset(request ()->files) && count (request ()->files) > 0) {
            if ($model->get_images_attr () != []) {
                $folder = $model->get_folder_images ();
                foreach ($model->get_images_attr () as $image) {
                    if ($_FILES[$image] && $_FILES[$image]['name'] != '') {
                        deleteImage ($model[$image], $folder);
                        $names = saveImage (request ()[$image], $folder);
                        foreach ($names as $x) {
                            $fields[$image] = $x;
                            $model->update ($fields);
                        }

                    } else {
                        $fields[$image] = $model[$image];
                    }
                }
            }

            if ($model->get_videos_attr () != []) {
                $folder_videos = $model->get_folder_videos ();
                foreach ($model->get_videos_attr () as $video) {
                    if ($_FILES[$video] && $_FILES[$video]['name'] != '') {
                        deleteVideo ($model[$video], $folder_videos);
                        $fields[$video] = saveVideo (request ()[$video], $folder_videos);
                    } else {
                        $fields[$video] = $model[$video];
                    }
                }
                return $model->update ($fields);
            }
            if ($model->get_pdf_attr () != []) {
                $folder_pdf = $model->get_folder_pdf ();
                foreach ($model->get_pdf_attr () as $pdf) {
                    if ($_FILES[$pdf] && $_FILES[$pdf]['name'] != '') {
                        deletePdf ($model[$pdf], $folder_pdf);
                        $fields[$pdf] = savePdf (request ()[$pdf], $folder_pdf);
                    } else {
                        $fields[$pdf] = $model[$pdf];
                    }
                }
                return $model->update ($fields);
            }

        } else{
            return $model->update ($fields);
        }

    }

    public function deleteMedia ()
    {

        if ($this->get_folder_images () != '') {
            $folder = $this->get_folder_images ();
            foreach ($this->get_images_attr () as $image) {
                deleteImage ($this[$image], $folder);
            }
        }

        if ($this->get_folder_videos () != '') {
            $folder_videos = $this->get_folder_videos ();
            foreach ($this->get_videos_attr () as $video) {
                deleteVideo ($this[$video], $folder_videos);
            }
        }

        if ($this->get_folder_pdf () != '') {
            $folder_pdf = $this->get_folder_pdf ();
            foreach ($this->get_pdf_attr () as $pdf) {
                deletePdf ($this[$pdf], $folder_pdf);
            }
        }
    }
}
