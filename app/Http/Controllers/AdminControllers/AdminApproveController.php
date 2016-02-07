<?php
namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use ZaWeb\Core\Controllers\AbstractAdminController;
use App\Models\Advertisement;

/**
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class AdminApproveController extends AbstractAdminController
{
    /**
     *
     * @param  int $id
     * @return Response
     * @Get("/{id}/approve",as="admin.advertisement.approve")
     */
    public function approve(Advertisement $advertisement)
    {
        $advertisement->approved = 1;
        $advertisement->save();
        return \Redirect::back();
    }

}