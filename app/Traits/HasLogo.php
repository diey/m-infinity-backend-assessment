<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasLogo
{
    /**
     * Check if company has logo uploaded
     *
     * @return bool
     */
    public function hasLogo(): bool
    {
        return ! is_null($this->logo_path);
    }

    /**
     * Update the company's logo.
     *
     * @param  UploadedFile  $logo
     * @return void
     */
    public function updateLogo(UploadedFile $logo): void
    {
        tap($this->logo_path, function ($previous) use ($logo) {
            $this->forceFill([
                'logo_path' => $logo->storePublicly(
                    'companies', ['disk' => 'public']
                ),
            ])->save();

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }

    /**
     * Delete the company's logo.
     *
     * @return void
     */
    public function deleteLogo()
    {
        if (is_null($this->logo_path)) {
            return;
        }

        Storage::disk('public')->delete($this->logo_path);

        $this->forceFill([
            'logo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string|null
     */
    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo_path
            ? Storage::disk('public')->url($this->logo_path)
            : null;
    }
}
