<?php

namespace App\Http\Controllers;

use App\Exports\BookingWiseReportExport;
use App\Models\Booking;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function downloadBookingReport()
    {
        $bookingReportHeadings = config('excel-columns.booking-wise-report');
        $headings = [];
        $data = [];
        $bookings = Booking::with(['user', 'bookingProducts.product'])
            ->get()
            ->map(function ($booking, $key) use (&$headings, $bookingReportHeadings) {

                # add front end headings & values
                $headings = $bookingReportHeadings['front_row_headings'];
                $record = [
                    $booking->created_at->format('Y-m-d'),
                    $booking->id,
                    $booking->user->first_name,
                    $booking->user->email,
                    $booking->user->mobile_number
                ];

                if ($bookingProducts = $booking->bookingProducts) {
                    foreach ($bookingProducts as $bookingProduct) {
                        $product = $bookingProduct->product;

                        # add product headings & values
                        $headings = array_merge($headings, $bookingReportHeadings['product_headings']);
                        $record = array_merge($record, [$product->product_name, $product->price, $product->discount]);
                    }
                }

                # adding end row headings & values
                $headings = array_merge($headings, $bookingReportHeadings['end_row_headings']);
                $record = array_merge($record, [$booking->discount_amount, $booking->paid_amount, $booking->total_amount]);

                return $record;
            })->toArray();


        return \Excel::download(new BookingWiseReportExport($headings, $bookings), 'booking-wise-reports.xlsx');
    }

    public function downloadMonthWiseReport()
    {
        dd('downloadMonthWiseReport');
    }
}
