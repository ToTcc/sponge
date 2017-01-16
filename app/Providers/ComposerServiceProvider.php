<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    private $main, $menu, $user, $role, $action, $permission, 
        $activity, $activityComment, $activityJoin, $activityLeave, $activityPriceRule, $activitySign, $apply, $customer, $dictionary, $event, $eventComment, $eventJoin, $eventSign, $movie, $movieLike, $pay, $scoreRecord, $scoreRule, $suggestions, $sponsor;

    public function __construct() {
        $this->main = [
            'backend.layout.sidebar',
            'backend.layout.breadcrumbs',
        ];

        $this->menu = [
            'backend.menu.index',
            'backend.menu.search',
        ];

        $this->user = [
            'backend.user.index',
            'backend.user.search',
        ];

        $this->role = [
            'backend.role.index',
            'backend.role.search',
        ];

        $this->action = [
            'backend.action.index',
            'backend.action.search',
        ];

        $this->permission = [
            'backend.permission.index',
            'backend.permission.search',
        ];

        $this->activity = [
            'backend.activity.index',
        ];

        $this->activityComment = [
            'backend.activityComment.index',
        ];

        $this->activityJoin = [
            'backend.activityJoin.index',
        ];

        $this->activityLeave = [
            'backend.activityLeave.index',
        ];

        $this->activityPriceRule = [
            'backend.activityPriceRule.index',
        ];

        $this->activitySign = [
            'backend.activitySign.index',
        ];

        $this->apply = [
            'backend.apply.index',
        ];

        $this->customer = [
            'backend.customer.index',
        ];

        $this->dictionary = [
            'backend.dictionary.index',
        ];

        $this->event = [
            'backend.event.index',
        ];

        $this->eventComment = [
            'backend.eventComment.index',
        ];

        $this->eventJoin = [
            'backend.eventJoin.index',
        ];

        $this->eventSign = [
            'backend.eventSign.index',
        ];

        $this->movie = [
            'backend.movie.index',
        ];

        $this->movieLike = [
            'backend.movieLike.index',
        ];

        $this->pay = [
            'backend.pay.index',
        ];

        $this->scoreRecord = [
            'backend.scoreRecord.index',
        ];

        $this->scoreRule = [
            'backend.scoreRule.index',
        ];

        $this->suggestions = [
            'backend.suggestions.index',
        ];

        $this->sponsor = [
            'backend.sponsor.index'
        ];
    }

    /**
     * Bootstrap the application services.     *
     * @return void
     */
    public function boot() {
        view()->composer($this->main, 'App\Http\ViewComposers\MainComposer');
        view()->composer($this->menu, 'App\Http\ViewComposers\MenuComposer');
        view()->composer($this->user, 'App\Http\ViewComposers\UserComposer');
        view()->composer($this->role, 'App\Http\ViewComposers\RoleComposer');
        view()->composer($this->action, 'App\Http\ViewComposers\ActionComposer');
        view()->composer($this->permission, 'App\Http\ViewComposers\PermissionComposer');
        view()->composer($this->activity, 'App\Http\ViewComposers\ActivityComposer');
        view()->composer($this->activityComment, 'App\Http\ViewComposers\ActivityCommentComposer');
        view()->composer($this->activityJoin, 'App\Http\ViewComposers\ActivityJoinComposer');
        view()->composer($this->activityLeave, 'App\Http\ViewComposers\ActivityLeaveComposer');
        view()->composer($this->activityPriceRule, 'App\Http\ViewComposers\ActivityPriceRuleComposer');
        view()->composer($this->activitySign, 'App\Http\ViewComposers\ActivitySignComposer');
        view()->composer($this->apply, 'App\Http\ViewComposers\ApplyComposer');
        view()->composer($this->customer, 'App\Http\ViewComposers\CustomerComposer');
        view()->composer($this->dictionary, 'App\Http\ViewComposers\DictionaryComposer');
        view()->composer($this->event, 'App\Http\ViewComposers\EventComposer');
        view()->composer($this->eventComment, 'App\Http\ViewComposers\EventCommentComposer');
        view()->composer($this->eventJoin, 'App\Http\ViewComposers\EventJoinComposer');
        view()->composer($this->eventSign, 'App\Http\ViewComposers\EventSignComposer');
        view()->composer($this->movie, 'App\Http\ViewComposers\MovieComposer');
        view()->composer($this->movieLike, 'App\Http\ViewComposers\MovieLikeComposer');
        view()->composer($this->pay, 'App\Http\ViewComposers\PayComposer');
        view()->composer($this->scoreRecord, 'App\Http\ViewComposers\ScoreRecordComposer');
        view()->composer($this->scoreRule, 'App\Http\ViewComposers\ScoreRuleComposer');
        view()->composer($this->suggestions, 'App\Http\ViewComposers\SuggestionsComposer');
        view()->composer($this->sponsor, 'App\Http\ViewComposers\SponsorComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

    }
}
