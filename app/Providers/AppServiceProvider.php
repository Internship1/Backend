<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->Apply();
      $this->Comment();
      $this->Company();
      $this->Contract();
      $this->Feedback();
      $this->Follow();
      $this->Invitation();
      $this->Job();
      $this->Love();
      $this->Message();
      $this->Post();
      $this->Qualify();
      $this->Role();
      $this->StudentProfile();
      $this->User();
      $this->UserProfile();
      $this->StudentQualify();
      $this->JobQualify();
      $this->JobType();
      $this->JobTypeTable();

    }

    public function Apply()
    {
      return $this->app->bind('App\Repositories\ApplyRepository', 'App\Repositories\Eloquent\EloApplyRepository');
    }
    public function Comment()
    {
      return $this->app->bind('App\Repositories\CommentRepository', 'App\Repositories\Eloquent\EloCommentRepository');
    }
    public function Company()
    {
      return $this->app->bind('App\Repositories\CompanyRepository', 'App\Repositories\Eloquent\EloCompanyRepository');
    }
    public function Contract()
    {
      return $this->app->bind('App\Repositories\ContractRepository', 'App\Repositories\Eloquent\EloContractRepository');
    }
    public function Feedback()
    {
      return $this->app->bind('App\Repositories\FeedbackRepository', 'App\Repositories\Eloquent\EloFeedbackRepository');
    }
    public function Follow()
    {
      return $this->app->bind('App\Repositories\FollowRepository', 'App\Repositories\Eloquent\EloFollowRepository');
    }
    public function Invitation()
    {
      return $this->app->bind('App\Repositories\InvitationRepository', 'App\Repositories\Eloquent\EloInvitationRepository');
    }
    public function Job()
    {
      return $this->app->bind('App\Repositories\JobRepository', 'App\Repositories\Eloquent\EloJobRepository');
    }
    public function Love()
    {
      return $this->app->bind('App\Repositories\LoveRepository', 'App\Repositories\Eloquent\EloLoveRepository');
    }
    public function Message()
    {
      return $this->app->bind('App\Repositories\MessageRepository', 'App\Repositories\Eloquent\EloMessageRepository');
    }
    public function Post()
    {
      return $this->app->bind('App\Repositories\PostRepository', 'App\Repositories\Eloquent\EloPostRepository');
    }
    public function Qualify()
    {
      return $this->app->bind('App\Repositories\QualifyRepository', 'App\Repositories\Eloquent\EloQualifyRepository');
    }
    public function Role()
    {
      return $this->app->bind('App\Repositories\RoleRepository', 'App\Repositories\Eloquent\EloRoleRepository');
    }
    public function StudentProfile()
    {
      return $this->app->bind('App\Repositories\StudentProfileRepository', 'App\Repositories\Eloquent\EloStudentProfileRepository');
    }
    public function User()
    {
      return $this->app->bind('App\Repositories\UserRepository', 'App\Repositories\Eloquent\EloUserRepository');
    }
    public function UserProfile()
    {
      return $this->app->bind('App\Repositories\UserProfileRepository', 'App\Repositories\Eloquent\EloUserProfileRepository');
    }

    //////
    public function StudentQualify()
    {
      return $this->app->bind('App\Repositories\StudentQualifyRepository', 'App\Repositories\Eloquent\EloStudentQualifyRepository');
    }
    public function JobQualify()
    {
      return $this->app->bind('App\Repositories\JobQualifyRepository', 'App\Repositories\Eloquent\EloJobQualifyRepository');
    }
    public function JobType()
    {
      return $this->app->bind('App\Repositories\JobTypeRepository', 'App\Repositories\Eloquent\EloJobTypeRepository');
    }
    public function JobTypeTable()
    {
      return $this->app->bind('App\Repositories\JobTypeTableRepository', 'App\Repositories\Eloquent\EloJobTypeTableRepository');
    }



}
