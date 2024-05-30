<?php

namespace App\Services;

use App\Http\Requests\StoreBackgroundRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateBackgroundRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Background;
use App\Models\Sale;

class BackgroundService
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreSaleRequest $request
     *
     * @return array|bool
     */
    public function store(StoreBackgroundRequest $request): array|bool
    {
        $data = $request->validated();
        if($request->show_in != 'Layanan') {
            $data['service_id'] = null;
        }
        
        if ($request->show_in != 'Tentang Kami') {
            $data['about_in'] = null;
        }

        $fileName = $request->show_in;
        if ($data['service_id'] != null) {
           $fileName = $fileName.'-'.$data['service_id'];
        }
        
        if ($data['about_in'] != null) {
           $fileName = $fileName.'-'.$data['about_in'];
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store('Background-'.$fileName, $request->type, 'public');
            return $data;
        }
        return false;
    }

    /**
     * Handle update data event to models.
     *
     * @param Sale $sale
     * @param UpdateSaleRequest $request
     *
     * @return array|bool
     */
    public function update(Background $background, UpdateBackgroundRequest $request): array|bool
    {
        $data = $request->validated();
        if($request->show_in != 'Layanan') {
            $data['service_id'] = null;
        }

        if ($request->show_in != 'Tentang Kami') {
            $data['about_in'] = null;
        }

        $fileName = $request->show_in;
        if ($data['service_id'] != null) {
           $fileName = $fileName.'-'.$data['service_id'];
        }
        
        if ($data['about_in'] != null) {
           $fileName = $fileName.'-'.$data['about_in'];
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->remove($background->image);
            $data['image'] = $request->file('image')->store('Background-'.$fileName, $request->type, 'public');
        } else {
            $data['image'] = $background->image;
        }

        return $data;
    }

    public function delete(Background $background)
    {
        $this->remove($background->image);
    }
}
