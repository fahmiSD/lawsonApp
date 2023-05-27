<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class SalesController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function exportPerBulan()
    {
        // Ambil data penjualan dari database
        $salesData = OrderItems::join('products', 'order_items.product_id', '=', 'products.product_id')
            ->select(
                'order_items.date',
                'order_items.quantity',
                'products.name as product_name',
                'products.price'
            )
            ->get();

        // Buat array asosiatif untuk grup data per bulan
        $groupedData = [];
        foreach ($salesData as $sale) {
            $bulan = date('F Y', strtotime($sale->date));

            if (!isset($groupedData[$bulan])) {
                $groupedData[$bulan] = [
                    'data' => [],
                    'total_price' => 0
                ];
            }

            $price = $sale->price;
            $totalPrice = $sale->quantity * $price;

            $groupedData[$bulan]['data'][] = [
                'Date' => $sale->date,
                'Quantity' => $sale->quantity,
                'Product Name' => $sale->product_name,
                'Price' => $price,
                'Total Price' => $totalPrice,
            ];

            $groupedData[$bulan]['total_price'] += $totalPrice;
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Quantity');
        $sheet->setCellValue('C1', 'Product Name');
        $sheet->setCellValue('D1', 'Price');
        $sheet->setCellValue('E1', 'Total Price');

        // Populate the sales data per bulan
        $row = 2;
        foreach ($groupedData as $bulan => $data) {
            $sheet->setCellValue('A' . $row, $bulan);

            foreach ($data['data'] as $item) {
                $sheet->setCellValue('B' . $row, $item['Quantity']);
                $sheet->setCellValue('C' . $row, $item['Product Name']);
                $sheet->setCellValue('D' . $row, $item['Price']);
                $sheet->setCellValue('E' . $row, $item['Total Price']);
                $row++;
            }

            // Tambahkan total price pada akhir bulan
            $sheet->setCellValue('D' . $row, 'Total Price');
            $sheet->setCellValue('E' . $row, $data['total_price']);
            $row++;

            // Add an empty row between bulan
            $row++;
        }

        // Create a new Xlsx writer and save the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filename = 'sales_data_perbulan.xlsx';
        $writer->save($filename);

        // Set the response headers for file download
        return response()->download($filename)->deleteFileAfterSend(true);
    }


    public function kirimPerBulan()
    {
        // Ambil data penjualan dari database
        $salesData = OrderItems::join('products', 'order_items.product_id', '=', 'products.product_id')
            ->select(
                'order_items.date',
                'order_items.quantity',
                'products.name as product_name',
                'products.price'
            )
            ->get();

        // Buat array asosiatif untuk grup data per bulan
        $groupedData = [];
        foreach ($salesData as $sale) {
            $bulan = date('F Y', strtotime($sale->date));

            if (!isset($groupedData[$bulan])) {
                $groupedData[$bulan] = [
                    'data' => [],
                    'total_price' => 0
                ];
            }

            $price = $sale->price;
            $totalPrice = $sale->quantity * $price;

            $groupedData[$bulan]['data'][] = [
                'Date' => $sale->date,
                'Quantity' => $sale->quantity,
                'Product Name' => $sale->product_name,
                'Price' => $price,
                'Total Price' => $totalPrice,
            ];

            $groupedData[$bulan]['total_price'] += $totalPrice;
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Quantity');
        $sheet->setCellValue('C1', 'Product Name');
        $sheet->setCellValue('D1', 'Price');
        $sheet->setCellValue('E1', 'Total Price');

        // Populate the sales data per bulan
        $row = 2;
        foreach ($groupedData as $bulan => $data) {
            $sheet->setCellValue('A' . $row, $bulan);

            foreach ($data['data'] as $item) {
                $sheet->setCellValue('B' . $row, $item['Quantity']);
                $sheet->setCellValue('C' . $row, $item['Product Name']);
                $sheet->setCellValue('D' . $row, $item['Price']);
                $sheet->setCellValue('E' . $row, $item['Total Price']);
                $row++;
            }

            // Tambahkan total price pada akhir bulan
            $sheet->setCellValue('D' . $row, 'Total Price');
            $sheet->setCellValue('E' . $row, $data['total_price']);
            $row++;

            // Add an empty row between bulan
            $row++;
        }

        // Create a new Xlsx writer and save the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filename = 'sales_data_perbulan.xlsx';
        $filePath = storage_path('app/' . $filename);
        $writer->save($filePath);
        // Send the email with attachment
        Mail::raw('Email body', function (Message $message) use ($filename) {
            $message->to('recipient@example.com');
            $message->subject('Email Subject');
            $message->attach($filename, [
                'as' => 'sales_data_perbulan.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
        });

        // Delete the temporary file
        unlink($filename);
    }

    public function exportPerProduct()
    {
        // Ambil data penjualan dari database
        $salesData = OrderItems::join('products', 'order_items.product_id', '=', 'products.product_id')
            ->select(
                'products.name as product_name',
                'order_items.date',
                'order_items.quantity',
                'products.price'
            )
            ->get();

        // Buat array asosiatif untuk grup data per produk
        $groupedData = [];
        foreach ($salesData as $sale) {
            $produk = $sale->product_name;

            if (!isset($groupedData[$produk])) {
                $groupedData[$produk] = [
                    'data' => [],
                    'total_price' => 0
                ];
            }

            $price = $sale->price;
            $totalPrice = $sale->quantity * $price;

            $groupedData[$produk]['data'][] = [
                'Product Name' => $sale->product_name,
                'Date' => $sale->date,
                'Quantity' => $sale->quantity,
                'Price' => $price,
                'Total Price' => $totalPrice,
            ];

            $groupedData[$produk]['total_price'] += $totalPrice;
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'Product Name');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'Price');
        $sheet->setCellValue('E1', 'Total Price');

        // Populate the sales data per produk
        $row = 2;
        foreach ($groupedData as $produk => $data) {
            $sheet->setCellValue('A' . $row, $produk);

            foreach ($data['data'] as $item) {
                $sheet->setCellValue('B' . $row, $item['Date']);
                $sheet->setCellValue('C' . $row, $item['Quantity']);
                $sheet->setCellValue('D' . $row, $item['Price']);
                $sheet->setCellValue('E' . $row, $item['Total Price']);
                $row++;
            }

            // Tambahkan total price pada akhir produk
            $sheet->setCellValue('D' . $row, 'Total Price');
            $sheet->setCellValue('E' . $row, $data['total_price']);
            $row++;

            // Add an empty row between produk
            $row++;
        }

        // Create a new Xlsx writer and save the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filename = 'sales_data_perproduk.xlsx';
        $writer->save($filename);

        // Set the response headers for file download
        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function exportPerCity()
    {
        // Ambil data penjualan dari database
        $salesData = OrderItems::join('products', 'order_items.product_id', '=', 'products.product_id')
            ->join('merchants', 'products.merchant_id', '=', 'merchants.id')
            ->join('cities', 'merchants.city_id', '=', 'cities.id')
            ->select(
                'cities.name as city_name',
                'order_items.date',
                'order_items.quantity',
                'products.name as product_name',
                'products.price'
            )
            ->get();

        // Buat array asosiatif untuk grup data per kota
        $groupedData = [];
        foreach ($salesData as $sale) {
            $kota = $sale->city_name;

            if (!isset($groupedData[$kota])) {
                $groupedData[$kota] = [
                    'data' => [],
                    'total_price' => 0
                ];
            }

            $price = $sale->price;
            $totalPrice = $sale->quantity * $price;

            $groupedData[$kota]['data'][] = [
                'City' => $sale->city_name,
                'Date' => $sale->date,
                'Quantity' => $sale->quantity,
                'Product Name' => $sale->product_name,
                'Price' => $price,
                'Total Price' => $totalPrice,
            ];

            $groupedData[$kota]['total_price'] += $totalPrice;
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'City');
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'Product Name');
        $sheet->setCellValue('E1', 'Price');
        $sheet->setCellValue('F1', 'Total Price');

        // Populate the sales data per kota
        $row = 2;
        foreach ($groupedData as $kota => $data) {
            $sheet->setCellValue('A' . $row, $kota);

            foreach ($data['data'] as $item) {
                $sheet->setCellValue('B' . $row, $item['Date']);
                $sheet->setCellValue('C' . $row, $item['Quantity']);
                $sheet->setCellValue('D' . $row, $item['Product Name']);
                $sheet->setCellValue('E' . $row, $item['Price']);
                $sheet->setCellValue('F' . $row, $item['Total Price']);
                $row++;
            }

            // Tambahkan total price pada akhir kota
            $sheet->setCellValue('E' . $row, 'Total Price');
            $sheet->setCellValue('F' . $row, $data['total_price']);
            $row++;

            // Add an empty row between kota
            $row++;
        }

        // Create a new Xlsx writer and save the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filename = 'sales_data_perkota.xlsx';
        $writer->save($filename);

        // Set the response headers for file download
        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function exportPerUser()
    {
        // Ambil data penjualan per pengguna dari database
        $salesData = OrderItems::join('users', 'order_items.user_id', '=', 'users.id')
            ->join('products', 'order_items.product_id', '=', 'products.product_id')
            ->select(
                'users.full_name',
                'order_items.date',
                'order_items.quantity',
                'products.name as product_name',
                'products.price'
            )
            ->get();

        // Buat array asosiatif untuk grup data per pengguna
        $groupedData = [];
        foreach ($salesData as $sale) {
            $userId = $sale->user_id;
            $month = date('Y-m', strtotime($sale->date));

            if (!isset($groupedData[$userId][$month])) {
                $groupedData[$userId][$month] = [
                    'user' => $sale->full_name,
                    'data' => [],
                    'total_price' => 0
                ];
            }

            $price = $sale->price;
            $totalPrice = $sale->quantity * $price;

            $groupedData[$userId][$month]['data'][] = [
                'Date' => $sale->date,
                'Quantity' => $sale->quantity,
                'Product Name' => $sale->product_name,
                'Price' => $price,
                'Total Price' => $totalPrice,
            ];

            $groupedData[$userId][$month]['total_price'] += $totalPrice;
        }

        // Urutkan data berdasarkan total belanja per bulan per pengguna
        foreach ($groupedData as &$userData) {
            arsort($userData);
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'User');
        $sheet->setCellValue('B1', 'Month');
        $sheet->setCellValue('C1', 'Date');
        $sheet->setCellValue('D1', 'Quantity');
        $sheet->setCellValue('E1', 'Product Name');
        $sheet->setCellValue('F1', 'Price');
        $sheet->setCellValue('G1', 'Total Price');

        // Populate the sales data per user per month
        $row = 2;
        foreach ($groupedData as $userData) {
            foreach ($userData as $month => $data) {
                $sheet->setCellValue('A' . $row, $data['user']);
                $sheet->setCellValue('B' . $row, $month);

                foreach ($data['data'] as $item) {
                    $sheet->setCellValue('C' . $row, $item['Date']);
                    $sheet->setCellValue('D' . $row, $item['Quantity']);
                    $sheet->setCellValue('E' . $row, $item['Product Name']);
                    $sheet->setCellValue('F' . $row, $item['Price']);
                    $sheet->setCellValue('G' . $row, $item['Total Price']);
                    $row++;
                }

                // Tambahkan total price pada akhir bulan
                $sheet->setCellValue('F' . $row, 'Total Price');
                $sheet->setCellValue('G' . $row, $data['total_price']);
                $row++;
            }
        }

        // Create a new Xlsx writer and save the spreadsheet to a file
        $writer = new Xlsx($spreadsheet);
        $filename = 'sales_data_peruser.xlsx';
        $writer->save($filename);

        // Set the response headers for file download
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
