<?php
/**
 * Created by PhpStorm.
 * User: josephsaliba
 * Date: 1/30/17
 * Time: 1:41 PM
 */

namespace App\Api\v1\News;


use App\Base\vendor\Framework\BaseAction;
use App\Helpers\Groups\GroupsHelper;
use App\Models\DomainUser;
use App\Models\News\News;

/**
 * Details
 *
 * @author Joseph Saliba <joe@getray.com>
 */
class DetailsAction extends BaseAction
{
    protected $private = false;
    protected $verbs = array('POST', 'GET');

    /**
     * @doc {
     *
     * }
     * @var array
     */
    protected $inputRules = [
        'news_id' => 'required',
        'reply_id' => ''
    ];

    const THIS_ARTICLE_IS_CURRENTLY_UNAVAILABLE = "This article is currently unavailable.";

    public function execute()
    {
        $newsId = $this->request->input('news_id');
        $userId = \Auth::id();
        // tODO THIS IS HORRIBLE DOMAIN ID CAN BE PASSED AS NULL BECAUSE THERE IS NO JOIN INSIDE ON GROUP TO CHECK DOMAIN ID
        // Another problem here is that this api doesn't require domain ID.. scary..

        $allGroupsIds = GroupsHelper::getUsersGroups(null, [$userId], true);

        $query = News::where(function ($q) use ($userId, $allGroupsIds) {
            return $q->where('to_domain', 1)
                ->orWhereHas('newsUsers', function ($q) use ($userId) {
                    return $q->where('user_id', $userId);
                })
                ->orWhereHas('newsGroups', function ($q) use ($allGroupsIds) {
                    return $q->whereIn('group_id', $allGroupsIds);
                });
        })->with(['tags', 'discussionThread'])
            ->where('active', '=', 1)
            ->where('id', '=', $newsId)
            ->first();
        // TODO : validate user belong to domain that this news comes from.

        if (!$query) {
            $this->response->addErrorDialog(self::THIS_ARTICLE_IS_CURRENTLY_UNAVAILABLE);
            return $this->response->statusFail();
        }
        $domainUserExists = DomainUser::where('user_id', $userId)->where('domain_id', $query->domain_id)->where('active', 1)->exists();
        if (!$domainUserExists) {
            $this->response->addErrorDialog(self::THIS_ARTICLE_IS_CURRENTLY_UNAVAILABLE);
            return $this->response->statusFail();
        }

        return $this->response->statusOk([
            'news' => $query
        ]);
    }


}