<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Mail\WatchlistMail;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;


class WatchlistCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watchlist:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todays = Item::where('expiry_date', '=', Carbon::today())->orderBy('expiry_date')->get();
        $sevendays = Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(1), Carbon::today()->addDays(7)])->orderBy('expiry_date')->get();
        $fourteendays = Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(8), Carbon::today()->addDays(14)])->orderBy('expiry_date')->get();
        $thirtydays = Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(15), Carbon::today()->addDays(30)])->orderBy('expiry_date')->get();
        $cc = 'g-itapps@mymrt.com.my';

        if ($todays != null) {
            $emails = $todays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING TODAY',
                'todays' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->where('expiry_date', '=', Carbon::today())->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->cc($cc)->send(new WatchlistMail($maildata));
            }

            // dd("Mail has been sent successfully");
        }
        if ($sevendays != null) {
            $emails = $sevendays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING IN 7 DAYS',
                'sevendays' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(1), Carbon::today()->addDays(7)])->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }
        }
        if ($fourteendays != null) {
            $emails = $fourteendays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING IN 14 DAYS',
                'fourteens' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(8), Carbon::today()->addDays(14)])->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }
        }
        if ($thirtydays != null) {
            $emails = $thirtydays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING IN 30 DAYS',
                'thirtydays' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(15), Carbon::today()->addDays(30)])->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }
        }
    }
}
