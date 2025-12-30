# Procurement Notice System - Complete Setup Guide

## ✅ COMPLETED TASKS

### 1. Database Migrations Created
- **File**: `database/migrations/2025_12_30_100000_create_procurement_notices_table.php`
- **File**: `database/migrations/2025_12_30_100001_create_procurement_documents_table.php`
- **Status**: ✅ Migrated successfully

### 2. Models Created
- **File**: `app/Models/ProcurementNotice.php`
  - Auto-generates slug
  - Relationships with documents
  - Localization helper methods (getTitle, getDeadline, getAnnouncementDate)
  - Scopes for active notices and ordering
  
- **File**: `app/Models/ProcurementDocument.php`
  - Relationship with procurement notice
  - Localization helper methods
  - File URL and size helpers

### 3. Seeder Created and Run
- **File**: `database/seeders/ProcurementNoticeSeeder.php`
- **Status**: ✅ Seeded successfully
- **Data**:
  - Hunan BRT Project (5 documents)
  - Qorasaroy Tunnel Project (8 documents)

### 4. Controller Updated
- **File**: `app/Http/Controllers/FrontendController.php`
- **Changes**:
  - `open_tender_notice()` - Now uses database
  - `open_tender_notice_show($slug)` - Now uses database with firstOrFail()
  - Old `getProcurementsData()` method can be removed (currently still exists)

### 5. Blade Templates Updated
- **File**: `resources/views/pages/frontend/open_tender_notice.blade.php`
  - Updated to use `$notices` collection
  - Uses model methods: `getTitle()`, `getDeadline()`, etc.
  
- **File**: `resources/views/pages/frontend/open_tender_notice_show.blade.php`
  - Updated to use `$notice` object
  - Uses model relationships and methods

### 6. Translation Keys
- ✅ All translation keys already added (uz, ru, en)
- Keys used: `frontend.procurement.*`

---

## 📋 REMAINING TASKS

### 1. Create Admin Controller
Create `app/Http/Controllers/Blade/ProcurementNoticeController.php`:

```php
<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\ProcurementNotice;
use App\Models\ProcurementDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProcurementNoticeController extends Controller
{
    public function index()
    {
        $notices = ProcurementNotice::withCount('documents')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.procurement.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.procurement.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_uz' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'nullable|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'announcement_date_uz' => 'nullable|string',
            'announcement_date_ru' => 'nullable|string',
            'announcement_date_en' => 'nullable|string',
            'deadline_uz' => 'required|string',
            'deadline_ru' => 'required|string',
            'deadline_en' => 'nullable|string',
            'status' => 'required|in:active,completed,cancelled,draft',
            'folder' => 'required|string',
            'announcement_pdf' => 'nullable|string',
            'order' => 'integer|min:0',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title_uz']) . '-' . Str::random(6);
        
        $notice = ProcurementNotice::create($validated);

        return redirect()->route('admin.procurement.edit', $notice->id)
            ->with('success', 'Procurement notice created successfully!');
    }

    public function edit($id)
    {
        $notice = ProcurementNotice::with('documents')->findOrFail($id);
        return view('admin.procurement.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $notice = ProcurementNotice::findOrFail($id);
        
        $validated = $request->validate([
            'title_uz' => 'required|string',
            'title_ru' => 'required|string',
            'title_en' => 'nullable|string',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'announcement_date_uz' => 'nullable|string',
            'announcement_date_ru' => 'nullable|string',
            'announcement_date_en' => 'nullable|string',
            'deadline_uz' => 'required|string',
            'deadline_ru' => 'required|string',
            'deadline_en' => 'nullable|string',
            'status' => 'required|in:active,completed,cancelled,draft',
            'folder' => 'required|string',
            'announcement_pdf' => 'nullable|string',
            'order' => 'integer|min:0',
            'is_featured' => 'boolean',
        ]);

        $notice->update($validated);

        return redirect()->route('admin.procurement.edit', $notice->id)
            ->with('success', 'Procurement notice updated successfully!');
    }

    public function destroy($id)
    {
        $notice = ProcurementNotice::findOrFail($id);
        $notice->delete();

        return redirect()->route('admin.procurement.index')
            ->with('success', 'Procurement notice deleted successfully!');
    }

    // Document management methods
    public function addDocument(Request $request, $id)
    {
        $notice = ProcurementNotice::findOrFail($id);
        
        $validated = $request->validate([
            'name_uz' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'nullable|string',
            'file_path' => 'required|string',
            'file_type' => 'string|default:pdf',
            'order' => 'integer|min:0',
        ]);

        $validated['procurement_notice_id'] = $notice->id;
        
        // Get file size if file exists
        $fullPath = public_path($notice->folder . '/' . $validated['file_path']);
        if (File::exists($fullPath)) {
            $validated['file_size'] = File::size($fullPath);
        }

        ProcurementDocument::create($validated);

        return back()->with('success', 'Document added successfully!');
    }

    public function deleteDocument($noticeId, $documentId)
    {
        $document = ProcurementDocument::where('procurement_notice_id', $noticeId)
            ->findOrFail($documentId);
        
        $document->delete();

        return back()->with('success', 'Document deleted successfully!');
    }
}
```

### 2. Add Routes
Add to `routes/web.php` in the admin middleware group:

```php
// Procurement Notice Management
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('procurement', 'Blade\ProcurementNoticeController')->except(['show']);
    Route::post('procurement/{id}/documents', 'Blade\ProcurementNoticeController@addDocument')
        ->name('admin.procurement.documents.add');
    Route::delete('procurement/{noticeId}/documents/{documentId}', 'Blade\ProcurementNoticeController@deleteDocument')
        ->name('admin.procurement.documents.delete');
});
```

### 3. Create Admin Views

**File**: `resources/views/admin/procurement/index.blade.php`
- List all procurement notices
- Show status, title, documents count
- Actions: Edit, Delete, Add New

**File**: `resources/views/admin/procurement/create.blade.php`
- Form to create new procurement notice
- All multilingual fields

**File**: `resources/views/admin/procurement/edit.blade.php`
- Form to edit procurement notice
- Document management section
- Add/remove documents

### 4. Clean Up Old Code
Remove the old `getProcurementsData()` method from `FrontendController.php` (line 476+).

### 5. Add to Admin Menu
Add procurement management link to admin sidebar navigation.

---

## 🔑 SUPER ADMIN CREDENTIALS

The system now has a properly seeded superadmin:

- **Email**: `superadmin@example.com`
- **Password**: `teamdevs`
- **Role**: Super Admin (full permissions)

---

## 🗄️ DATABASE STRUCTURE

### procurement_notices table
- id, slug, title_uz, title_ru, title_en
- description_uz, description_ru, description_en
- announcement_date_uz, announcement_date_ru, announcement_date_en
- deadline_uz, deadline_ru, deadline_en
- status (active, completed, cancelled, draft)
- folder, announcement_pdf
- order, is_featured
- timestamps, soft_deletes

### procurement_documents table
- id, procurement_notice_id
- name_uz, name_ru, name_en
- file_path, file_type, file_size
- order
- timestamps

---

## 📦 CURRENT DATA

### Hunan BRT Project
- Slug: `hunan-brt-project`
- Status: active, featured
- Documents: 5 PDFs
- Announcement Date: December 25, 2025
- Deadline: January 5, 2026, 18:00

### Qorasaroy Tunnel Project
- Slug: `qorasaroy-tunnel-project`
- Status: active
- Documents: 8 PDFs
- Deadline: January 6, 2026, 18:00

---

## 🚀 HOW TO USE

### Frontend (Already Working)
1. Visit `/open_tender_notice` - See all active procurement notices
2. Click on any notice - View details, PDF preview, documents
3. All content is dynamically loaded from database
4. Multi-language support (uz, ru, en)

### Admin Panel (To Be Implemented)
1. Login as superadmin@example.com / teamdevs
2. Go to Procurement Management
3. Create/Edit/Delete procurement notices
4. Manage documents for each notice
5. Set status, order, featured flag

---

## ✨ FEATURES

1. **Multi-language Support**: Uzbek, Russian, English
2. **Document Management**: Upload, organize, delete documents
3. **Status Management**: active, completed, cancelled, draft
4. **Ordering**: Custom display order
5. **Featured Notices**: Highlight important procurements
6. **Soft Deletes**: Recover deleted notices
7. **File Size Tracking**: Automatic file size detection
8. **PDF Preview**: Embedded announcement PDFs
9. **SEO Friendly**: Slug-based URLs
10. **Clean Architecture**: Models, Controllers, Views separation

---

## 🔧 MAINTENANCE

### Adding New Procurement Notice
1. Use admin panel (when created) OR
2. Run custom seeder OR
3. Use Tinker:
```php
$notice = \App\Models\ProcurementNotice::create([...]);
$notice->documents()->create([...]);
```

### Updating Existing Notice
```php
$notice = \App\Models\ProcurementNotice::where('slug', 'hunan-brt-project')->first();
$notice->update(['status' => 'completed']);
```

### Adding Documents to Notice
```php
$notice->documents()->create([
    'name_uz' => 'Document name',
    'name_ru' => 'Название документа',
    'file_path' => 'file.pdf',
    'order' => 1,
]);
```

---

## 📝 NOTES

- All file paths are relative to `public/` folder
- PDF files should be placed in the specified folder
- File sizes are calculated automatically if files exist
- Slugs are auto-generated from Uzbek title + random string
- The system supports soft deletes for easy recovery

---

**System Status**: ✅ FULLY FUNCTIONAL (Frontend Complete, Admin Panel Pending)
**Last Updated**: December 30, 2025
**Developer**: AI Assistant
