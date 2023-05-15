<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Mail\WatchlistMail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;

class MailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendMail()
    {
        $todays = Item::where('expiry_date', '=', Carbon::today())->orderBy('expiry_date')->get();
        $sevendays = Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(1), Carbon::today()->addDays(7)])->orderBy('expiry_date')->get();
        $fourteendays = Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(8), Carbon::today()->addDays(14)])->orderBy('expiry_date')->get();
        $thirtydays = Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(15), Carbon::today()->addDays(30)])->orderBy('expiry_date')->get();

        if ($todays != null) {
            $emails = $todays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING',
                'todays' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->where('expiry_date', '=', Carbon::today())->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }

            // dd("Mail has been sent successfully");
        }
        if ($sevendays != null) {
            $emails = $sevendays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING',
                'sevendays' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(1), Carbon::today()->addDays(7)])->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }
        }
        if ($fourteendays != null) {
            $emails = $fourteendays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING',
                'fourteens' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(8), Carbon::today()->addDays(14)])->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }
        }
        if ($thirtydays != null) {
            $emails = $thirtydays;

            $maildata = [
                'title' => 'IT DEPARTMENT | DO NOT REPLY - WATCHLIST ITEM EXPIRING',
                'thirtydays' => Item::leftjoin('projects', 'items.project_id', '=', 'projects.project_id')->whereBetween('expiry_date', [Carbon::today()->addDays(15), Carbon::today()->addDays(30)])->orderBy('expiry_date')->get(),
            ];

            foreach ($emails as $key => $email) {
                Mail::to($email->item_PIC_email)->send(new WatchlistMail($maildata));
            }
        }

    }
}