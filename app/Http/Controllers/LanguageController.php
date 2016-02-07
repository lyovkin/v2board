<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Annotations\Annotations\Get;
use Illuminate\Routing\Annotations\Annotations\Middleware;
use Illuminate\Routing\Annotations\Annotations\Post;
use ZaWeb\Core\Controllers\AbstractController;
use Illuminate\Cookie\CookieJar;

/**
 * Class LanguageController
 * @package App\Http\Controllers
 * @Controller(prefix="/lang")
 * @Middleware("guest")
 */
class LanguageController extends AbstractController
{

    /**
     * @Post("/", as="lang.change")
     * @return Response
     */
    public function lang(Request $request, CookieJar $cookieJar)
    {
        $resp = JsonResponse::create();
        \Session::set('language', $request->get('language'));
        //$resp->withCookie(\Cookie::forever());
        return $resp;
        //
    }

}