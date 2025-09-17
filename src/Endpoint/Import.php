<?php

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Bag\ContactBag;
use App\Services\SmartEmailing\Api\src\Model\Import\Import as ImportModel;
use App\Services\SmartEmailing\Api\src\Response\ImportResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;

class Import extends AbstractEndpoint
{
    Const string URL_IMPORT = 'import';
    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Import-Import_contacts
     */
    public function contacts(ImportModel $import): ?SmartEmailingResponseInterface
    {
        if (!$import->getContactBag()->isEmpty()) {
            $contacts = $import->getContactBag()->getItems();
            $lastResponse = null;

            foreach (\array_chunk($contacts, $this->chunkLimit) as $contacts) {
                $chunkContactBag = new ContactBag();
                $chunkContactBag->setItems($contacts);
                $chunkImport = new ImportModel($chunkContactBag, $import->getSettings());

                $responseHttp = $this->post(self::URL_IMPORT, $chunkImport->toArray());

                $lastResponse = $this->buildResponse($responseHttp, ImportResponse::class);
            }

            return $lastResponse;
        }

        return null;
    }
}