<?php
namespace ITSC\ForceHttps\Middleware\Frontend;

/*
 * Copyright (C) 2021 Patrick Crausaz <info@its-crausaz.ch>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\RedirectResponse;

/**
 * Class ForceHttps
 * @package ITSC\LanguageModeSwitch\Middleware\Frontend
 */
class ForceHttps implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$request->getAttribute('normalizedParams')->isHttps()) {
            $requestUrl = $request->getAttribute('normalizedParams')->getRequestUrl();
            if(str_contains($requestUrl, "http://")) {
                $requestUrl = str_replace(
                    "http://",
                    "https://",
                    $requestUrl
                );
                return new RedirectResponse($requestUrl);
            }
        }
        return $handler->handle($request);
    }
}