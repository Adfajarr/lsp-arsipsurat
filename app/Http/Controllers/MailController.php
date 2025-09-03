<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = mail::query();

        if ($search = $request->search) {
            $q->where('title', 'ILIKE', "%{$search}%");
        }
        
        $mails =$q->paginate(10);

            return view('mail.index', compact('mails', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('mail.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'file_path' => 'required|file|mimes:pdf|max:2048',
        ]);

        $filePath = $request->file('file_path')->store('mails', 'public');
        $data['file_path'] = $filePath;

        mail::create($data);

        // dd($data);

        return redirect()->route('mail.index')->with('success', 'Mail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mail = mail::findOrFail($id);
        return view('mail.show', compact('mail'));
    }


    public function download($id)
    {
        $mail = Mail::findOrFail($id);

        $filePath = storage_path('app/public/' . $mail->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan: ' . $filePath);
        }

        return response()->download($filePath, $mail->title . '.pdf');
    }

   public function edit($id)
    {
        $mail = mail::findOrFail($id);
        $categories = category::all();

        return view('mail.edit', compact('mail', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mail = Mail::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'number'      => 'nullable|string|max:255',
            'date'        => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'file_path'        => 'nullable|file|mimes:pdf|max:2048', 
        ]);

        DB::transaction(function () use ($request, $mail, &$data) {
            // jika ada file baru
            if ($request->hasFile('file')) {
                if ($mail->file_path && Storage::disk('public')->exists($mail->file_path)) {
                    Storage::disk('public')->delete($mail->file_path);
                }

                $ext = $request->file('file')->getClientOriginalExtension();
                $filename = Str::slug($request->title) . '_' . now()->format('YmdHis') . '.' . $ext;

                $filePath = $request->file('file')->storeAs('mails', $filename, 'public');
                $data['file_path'] = $filePath; 
            }

            $mail->update($data);
        });

        // dd($data);

        return redirect()->route('mail.index')->with('success', 'Mail updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mail $mail)
    {
        Storage::disk('public')->delete($mail->file_path);
        $mail->delete();
        return redirect()->route('mail.index')->with('success', 'Mail deleted successfully.');
    }
}
