<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository'
        );
        $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository'
        );
        $this->app->bind(
            'App\Repository\StudentPromotionRepositoryInterface',
            'App\Repository\StudentPromotionRepository'
        );
        $this->app->bind(
            'App\Repository\StudentGradeautedRepositoryInterface',
            'App\Repository\StudentGradeautedRepository'
        );
        $this->app->bind(
            'App\Repository\StudentFeesRepositoryInterface',
            'App\Repository\StudentFeesRepository'
        );
        $this->app->bind(
            'App\Repository\FeeInvoicesRepositoryInterface',
            'App\Repository\FeeInvoicesRepository'
        );
        $this->app->bind(
            'App\Repository\ReceiptStudentsRepositoryInterface',
            'App\Repository\ReceiptStudentsRepository'
        );
        $this->app->bind(
            'App\Repository\ProcessingFeeRepositoryInterface',
            'App\Repository\ProcessingFeeRepository'
        );
        $this->app->bind(
            'App\Repository\PaymentRepositoryInterface',
            'App\Repository\PaymentRepository'
        );
        $this->app->bind(
            'App\Repository\AttendanceRepositoryInterface',
            'App\Repository\AttendanceRepository'
        );
        $this->app->bind(
            'App\Repository\SubjectRepositoryInterface',
            'App\Repository\SubjectRepository'
        );
        $this->app->bind(
            'App\Repository\QuizzeRepositoryInterface',
            'App\Repository\QuizzeRepository'
        );
        $this->app->bind(
            'App\Repository\QuestionRepositoryInterface',
            'App\Repository\QuestionRepository'
        );
        $this->app->bind(
            'App\Repository\OnlineClasseRepositoryInterface',
            'App\Repository\OnlineClasseRepository'
        );
        $this->app->bind(
            'App\Repository\libraryRepositoryInterface',
            'App\Repository\libraryRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
