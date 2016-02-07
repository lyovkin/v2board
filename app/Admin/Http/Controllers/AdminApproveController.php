<?php

namespace AppAdmin\Http\Controllers;

use ZaWeb\Core\Controllers\AbstractAdminController;

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
    }

}