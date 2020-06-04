<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait
{
    /**
     * Faz o upload das imagens do produto adicionadas pelo usuário.
     * 
     * @param images imagens a serem upadas
     * @param imageColumn default=null
     * @return Array do caminho das imagens
     */
    private function imageUpload($images, $imageColumn = null)
    {
        $uploadedImages = array();

        if (is_array($images)) {
            foreach($images as $image) {
                $uploadedImages[] = [$imageColumn => $image->store('products', 'public')];
            }
        } else {
            $uploadedImages = $images->store('logo', 'public');
        }

        return $uploadedImages;
    }
}