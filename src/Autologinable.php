<?php

namespace Roomies\Autologin;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

trait Autologinable
{
    /**
     * Return an autologin link to the given path that will log the user in.
     *
     * @param  string  $path
     * @return string
     */
    public function autologinLink(string $path = '/'): string
    {
        $expiresAt = Carbon::now()->addDay();

        return URL::temporarySignedRoute('autologin', $expiresAt, [
            'id' => $this->getKey(),
            'path' => $path,
        ]);
    }
}
