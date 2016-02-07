<?php

Route::bind("shops", function($id) {
    return ZaWeb\Shops\Models\Shops::find($id);
});
