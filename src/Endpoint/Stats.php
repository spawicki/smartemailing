<?php

declare(strict_types=1);

namespace App\Services\SmartEmailing\Api\src\Endpoint;

use App\Services\SmartEmailing\Api\src\Response\BaseResponse;
use App\Services\SmartEmailing\Api\src\Response\SmartEmailingResponseInterface;
use App\Services\SmartEmailing\Api\src\Search\General\SearchCampaignStats;
use App\Services\SmartEmailing\Api\src\Search\General\SearchNewsletterStats;

class Stats extends AbstractEndpoint
{
    const string URL_CAMPAIGN_STATS_SENT = 'campaign-stats-sent';
    const string URL_NEWSLETTER_STATS_SUMMARY = 'newsletter-stats-summary';

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Stats-Get_campaign_sent_stats
     */
    public function getCampaignSent(?SearchCampaignStats $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchCampaignStats();
        $responseHttp = $this->get(self::URL_CAMPAIGN_STATS_SENT, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }

    /**
     * @see https://app.smartemailing.cz/docs/api/v3/index.html#api-Stats-Get_newsletter_stats_summaries
     */
    public function getNewsletterSummaries(?SearchNewsletterStats $search = null): SmartEmailingResponseInterface
    {
        $search ??= new SearchNewsletterStats();
        $responseHttp = $this->get(self::URL_NEWSLETTER_STATS_SUMMARY, $search->getAsQuery());
        return $this->buildResponse($responseHttp, BaseResponse::class);
    }
}