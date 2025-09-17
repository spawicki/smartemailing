<?php

declare(strict_types=1);

namespace Spawicki\SmartEmailing\Endpoint;

use Spawicki\SmartEmailing\Response\BaseResponse;
use Spawicki\SmartEmailing\Response\SmartEmailingResponseInterface;

class Scoring extends AbstractEndpoint
{
    const string URL_SCORING_RESULT_CHANGES = 'scoring-result-changes';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Scoring-Scoring_result_history
     */
    public function resultHistory(array $filter = []): SmartEmailingResponseInterface
    {
        $responseHttp = $this->get(self::URL_SCORING_RESULT_CHANGES, $filter);
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}