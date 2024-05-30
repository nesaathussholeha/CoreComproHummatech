<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\NewsImageUploader;
use Illuminate\Http\Request;

class ImageUploader extends Controller
{
    private NewsImageUploader $imageUpload;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsImageUploader $imageService)
    {
        $this->imageUpload = $imageService;
    }

    /**
     * Image Upload handler controller
     *
     * @return void
     */
    public function __invoke(Request $request)
    {
        $dataImage = $this->imageUpload->process($request);

        return ResponseHelper::success(['image' => $dataImage['files']]);
    }
}
