<?php

namespace Laraveldaily\LaraOnboarding;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Onboarding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onboarding:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send onboarding email to the user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @throws \Exception
     * @return mixed
     */
    public function handle()
    {
        if (!config('onboarding')) {
            throw new \Exception('Config file not published!');
        }
        foreach (config('onboarding') as $email_data) {

            $users = User::whereNull('unsubscribed_at')
                ->whereDate('created_at', '=', Carbon::today()->subDays($email_data['days'])->toDateString())
                ->get();

            $notified_users = 0;

            foreach ($users as $user) {
                $user->notify(new OnboardingMail($email_data));
                $notified_users++;
            }
            $this->info('Notified users: ' . $notified_users);
        }
    }
}
