<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MenuRepository;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ActionRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\ActivityRepository;
use App\Repositories\ActivityCommentRepository;
use App\Repositories\ActivityJoinRepository;
use App\Repositories\ActivityLeaveRepository;
use App\Repositories\ActivityPriceRuleRepository;
use App\Repositories\ActivitySignRepository;
use App\Repositories\ApplyRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\DictionaryRepository;
use App\Repositories\EventRepository;
use App\Repositories\EventCommentRepository;
use App\Repositories\EventJoinRepository;
use App\Repositories\EventSignRepository;
use App\Repositories\MovieRepository;
use App\Repositories\MovieLikeRepository;
use App\Repositories\PayRepository;
use App\Repositories\ScoreRecordRepository;
use App\Repositories\ScoreRuleRepository;
use App\Repositories\SuggestionsRepository;

class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // 合并自定义配置文件
        $configuration = realpath(__DIR__ . '/../../config/repository.php');
        $this->mergeConfigFrom($configuration, 'repository');
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->registerMenuRepository();
        $this->registerUserRepository();
        $this->registerRoleRepository();
        $this->registerActionRepository();
        $this->registerPermissionRepository();
        $this->registerActivityRepository();
        $this->registerActivityCommentRepository();
        $this->registerActivityJoinRepository();
        $this->registerActivityLeaveRepository();
        $this->registerActivityPriceRuleRepository();
        $this->registerActivitySignRepository();
        $this->registerApplyRepository();
        $this->registerCustomerRepository();
        $this->registerDictionaryRepository();
        $this->registerEventRepository();
        $this->registerEventCommentRepository();
        $this->registerEventJoinRepository();
        $this->registerEventSignRepository();
        $this->registerMovieRepository();
        $this->registerMovieLikeRepository();
        $this->registerPayRepository();
        $this->registerScoreRecordRepository();
        $this->registerScoreRuleRepository();
        $this->registerSuggestionsRepository();
    }


    /**
     * Register the Menu Repository
     *
     * @return mixed
     */
    public function registerMenuRepository() {
        $this->app->singleton('MenuRepository', function ($app) {
            $model = config('repository.models.menu');
            $menu = new $model();
            $validator = $app['validator'];

            return new MenuRepository($menu, $validator);
        });

        $this->app->alias('MenuRepository', RoleRepository::class);
    }

    /**
     * Register the User Repository
     *
     * @return mixed
     */
    public function registerUserRepository() {
        $this->app->singleton('UserRepository', function ($app) {
            $model = config('repository.models.user');
            $user = new $model();
            $validator = $app['validator'];

            return new UserRepository($user, $validator);
        });

        $this->app->alias('UserRepository', RoleRepository::class);
    }

    /**
     * Register the Role Repository
     *
     * @return mixed
     */
    public function registerRoleRepository() {
        $this->app->singleton('RoleRepository', function ($app) {
            $model = config('repository.models.role');
            $role = new $model();
            $validator = $app['validator'];

            return new RoleRepository($role, $validator);
        });

        $this->app->alias('RoleRepository', RoleRepository::class);
    }

    /**
     * Register the Action Repository
     *
     * @return mixed
     */
    public function registerActionRepository() {
        $this->app->singleton('ActionRepository', function ($app) {
            $model = config('repository.models.action');
            $action = new $model();
            $validator = $app['validator'];

            return new ActionRepository($action, $validator);
        });

        $this->app->alias('ActionRepository', RoleRepository::class);
    }

    /**
     * Register the Permission Repository
     *
     * @return mixed
     */
    public function registerPermissionRepository() {
        $this->app->singleton('PermissionRepository', function ($app) {
            $model = config('repository.models.permission');
            $permission = new $model();
            $validator = $app['validator'];

            return new PermissionRepository($permission, $validator);
        });

        $this->app->alias('PermissionRepository', RoleRepository::class);
    }

    /**
     * Register the Activity Repository
     *
     * @return mixed
     */
    public function registerActivityRepository() {
        $this->app->singleton('ActivityRepository', function ($app) {
            $model = config('repository.models.activity');
            $activity = new $model();
            $validator = $app['validator'];

            return new ActivityRepository($activity, $validator);
        });

        $this->app->alias('ActivityRepository', ActivityRepository::class);
    }

    /**
     * Register the ActivityComment Repository
     *
     * @return mixed
     */
    public function registerActivityCommentRepository() {
        $this->app->singleton('ActivityCommentRepository', function ($app) {
            $model = config('repository.models.activityComment');
            $activityComment = new $model();
            $validator = $app['validator'];

            return new ActivityCommentRepository($activityComment, $validator);
        });

        $this->app->alias('ActivityCommentRepository', ActivityCommentRepository::class);
    }

    /**
     * Register the ActivityJoin Repository
     *
     * @return mixed
     */
    public function registerActivityJoinRepository() {
        $this->app->singleton('ActivityJoinRepository', function ($app) {
            $model = config('repository.models.activityJoin');
            $activityJoin = new $model();
            $validator = $app['validator'];

            return new ActivityJoinRepository($activityJoin, $validator);
        });

        $this->app->alias('ActivityJoinRepository', ActivityJoinRepository::class);
    }

    /**
     * Register the ActivityLeave Repository
     *
     * @return mixed
     */
    public function registerActivityLeaveRepository() {
        $this->app->singleton('ActivityLeaveRepository', function ($app) {
            $model = config('repository.models.activityLeave');
            $activityLeave = new $model();
            $validator = $app['validator'];

            return new ActivityLeaveRepository($activityLeave, $validator);
        });

        $this->app->alias('ActivityLeaveRepository', ActivityLeaveRepository::class);
    }

    /**
     * Register the ActivityPriceRule Repository
     *
     * @return mixed
     */
    public function registerActivityPriceRuleRepository() {
        $this->app->singleton('ActivityPriceRuleRepository', function ($app) {
            $model = config('repository.models.activityPriceRule');
            $activityPriceRule = new $model();
            $validator = $app['validator'];

            return new ActivityPriceRuleRepository($activityPriceRule, $validator);
        });

        $this->app->alias('ActivityPriceRuleRepository', ActivityPriceRuleRepository::class);
    }

    /**
     * Register the ActivitySign Repository
     *
     * @return mixed
     */
    public function registerActivitySignRepository() {
        $this->app->singleton('ActivitySignRepository', function ($app) {
            $model = config('repository.models.activitySign');
            $activitySign = new $model();
            $validator = $app['validator'];

            return new ActivitySignRepository($activitySign, $validator);
        });

        $this->app->alias('ActivitySignRepository', ActivitySignRepository::class);
    }

    /**
     * Register the Apply Repository
     *
     * @return mixed
     */
    public function registerApplyRepository() {
        $this->app->singleton('ApplyRepository', function ($app) {
            $model = config('repository.models.apply');
            $apply = new $model();
            $validator = $app['validator'];

            return new ApplyRepository($apply, $validator);
        });

        $this->app->alias('ApplyRepository', ApplyRepository::class);
    }

    /**
     * Register the Customer Repository
     *
     * @return mixed
     */
    public function registerCustomerRepository() {
        $this->app->singleton('CustomerRepository', function ($app) {
            $model = config('repository.models.customer');
            $customer = new $model();
            $validator = $app['validator'];

            return new CustomerRepository($customer, $validator);
        });

        $this->app->alias('CustomerRepository', CustomerRepository::class);
    }

    /**
     * Register the Dictionary Repository
     *
     * @return mixed
     */
    public function registerDictionaryRepository() {
        $this->app->singleton('DictionaryRepository', function ($app) {
            $model = config('repository.models.dictionary');
            $dictionary = new $model();
            $validator = $app['validator'];

            return new DictionaryRepository($dictionary, $validator);
        });

        $this->app->alias('DictionaryRepository', DictionaryRepository::class);
    }

    /**
     * Register the Event Repository
     *
     * @return mixed
     */
    public function registerEventRepository() {
        $this->app->singleton('EventRepository', function ($app) {
            $model = config('repository.models.event');
            $event = new $model();
            $validator = $app['validator'];

            return new EventRepository($event, $validator);
        });

        $this->app->alias('EventRepository', EventRepository::class);
    }

    /**
     * Register the EventComment Repository
     *
     * @return mixed
     */
    public function registerEventCommentRepository() {
        $this->app->singleton('EventCommentRepository', function ($app) {
            $model = config('repository.models.eventComment');
            $eventComment = new $model();
            $validator = $app['validator'];

            return new EventCommentRepository($eventComment, $validator);
        });

        $this->app->alias('EventCommentRepository', EventCommentRepository::class);
    }

    /**
     * Register the EventJoin Repository
     *
     * @return mixed
     */
    public function registerEventJoinRepository() {
        $this->app->singleton('EventJoinRepository', function ($app) {
            $model = config('repository.models.eventJoin');
            $eventJoin = new $model();
            $validator = $app['validator'];

            return new EventJoinRepository($eventJoin, $validator);
        });

        $this->app->alias('EventJoinRepository', EventJoinRepository::class);
    }

    /**
     * Register the EventSign Repository
     *
     * @return mixed
     */
    public function registerEventSignRepository() {
        $this->app->singleton('EventSignRepository', function ($app) {
            $model = config('repository.models.eventSign');
            $eventSign = new $model();
            $validator = $app['validator'];

            return new EventSignRepository($eventSign, $validator);
        });

        $this->app->alias('EventSignRepository', EventSignRepository::class);
    }

    /**
     * Register the Movie Repository
     *
     * @return mixed
     */
    public function registerMovieRepository() {
        $this->app->singleton('MovieRepository', function ($app) {
            $model = config('repository.models.movie');
            $movie = new $model();
            $validator = $app['validator'];

            return new MovieRepository($movie, $validator);
        });

        $this->app->alias('MovieRepository', MovieRepository::class);
    }

    /**
     * Register the MovieLike Repository
     *
     * @return mixed
     */
    public function registerMovieLikeRepository() {
        $this->app->singleton('MovieLikeRepository', function ($app) {
            $model = config('repository.models.movieLike');
            $movieLike = new $model();
            $validator = $app['validator'];

            return new MovieLikeRepository($movieLike, $validator);
        });

        $this->app->alias('MovieLikeRepository', MovieLikeRepository::class);
    }

    /**
     * Register the Pay Repository
     *
     * @return mixed
     */
    public function registerPayRepository() {
        $this->app->singleton('PayRepository', function ($app) {
            $model = config('repository.models.pay');
            $pay = new $model();
            $validator = $app['validator'];

            return new PayRepository($pay, $validator);
        });

        $this->app->alias('PayRepository', PayRepository::class);
    }

    /**
     * Register the ScoreRecord Repository
     *
     * @return mixed
     */
    public function registerScoreRecordRepository() {
        $this->app->singleton('ScoreRecordRepository', function ($app) {
            $model = config('repository.models.scoreRecord');
            $scoreRecord = new $model();
            $validator = $app['validator'];

            return new ScoreRecordRepository($scoreRecord, $validator);
        });

        $this->app->alias('ScoreRecordRepository', ScoreRecordRepository::class);
    }

    /**
     * Register the ScoreRule Repository
     *
     * @return mixed
     */
    public function registerScoreRuleRepository() {
        $this->app->singleton('ScoreRuleRepository', function ($app) {
            $model = config('repository.models.scoreRule');
            $scoreRule = new $model();
            $validator = $app['validator'];

            return new ScoreRuleRepository($scoreRule, $validator);
        });

        $this->app->alias('ScoreRuleRepository', ScoreRuleRepository::class);
    }

    /**
     * Register the Suggestions Repository
     *
     * @return mixed
     */
    public function registerSuggestionsRepository() {
        $this->app->singleton('SuggestionsRepository', function ($app) {
            $model = config('repository.models.suggestions');
            $suggestions = new $model();
            $validator = $app['validator'];

            return new SuggestionsRepository($suggestions, $validator);
        });

        $this->app->alias('SuggestionsRepository', SuggestionsRepository::class);
    }
}
