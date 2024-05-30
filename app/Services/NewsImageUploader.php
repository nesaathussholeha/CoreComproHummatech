<?php

namespace App\Services;

use App\Enums\TypeEnum;
use App\Helpers\ImageCompressing;
use Illuminate\Http\Request;

class NewsImageUploader
{
    /**
     * Modal handler to upload description image
     *
     * @return mixed
     * @author @cakadi190
     */
    public function process(Request $request)
    {
        return ImageCompressing::process($request->title, $request->image, TypeEnum::NEWSDESC->value, [
            'quality' => 75,
        ]);
    }
}
