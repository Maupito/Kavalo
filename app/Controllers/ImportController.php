<?php

namespace App\Controllers;

use App\Models\ImportModel;

class ImportController extends BaseController
{
    public function index()
    {
        $importStatus = null;

        if ($this->request->getMethod() === 'post') {
            $importModel = new ImportModel();
            $importStatus = $importModel->importDataFromXML();
        }

        return view('admin/import', ['importStatus' => $importStatus]);
    }
}