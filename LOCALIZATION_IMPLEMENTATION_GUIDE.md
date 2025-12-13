# Multi-Language Localization Implementation Guide
## Tashkent Invest - Frontend Localization

**Date:** December 12, 2024  
**Status:** Translation Files Ready - Implementation Required

---

## ✅ COMPLETED WORK

### 1. Translation Files Created

Three comprehensive translation files have been created with 230+ translation keys each:

#### Files Created:
1. **`resources/lang/ru/frontend.php`** - Russian translations
2. **`resources/lang/uz/frontend.php`** - Uzbek translations  
3. **`resources/lang/en/frontend.php`** - English translations

#### Translation Categories:
- **Navigation** (nav) - 10 keys
- **Common** (common) - 18 keys
- **Home Page** (home) - 11 keys
- **Contact Page** (contact) - 16 keys
- **Renovation Projects** (renovation) - 27 keys
- **Investor Ideas** (investor_ideas) - 21 keys
- **Media/News** (media) - 9 keys
- **Documents** (documents) - 13 keys
- **Footer** (footer) - 9 keys
- **Breadcrumbs** (breadcrumb) - 5 keys
- **Status** (status) - 6 keys
- **Validation** (validation) - 7 keys
- **Tenders** (tenders) - 8 keys

**Total:** 160+ unique translation keys across all categories

---

## 🔧 EXISTING INFRASTRUCTURE

### Language Switching Already Works!

✅ **Route exists:** `/language/{lang}` → `changelang` route  
✅ **Supported languages:** uz, ru, en  
✅ **Session storage:** `locale` session variable  
✅ **Config:** Default locale: `uz`, Fallback: `ru`

**File:** `routes/web.php` (lines 112-120)
```php
Route::get('/language/{lang}', function ($lang) {
    $lang = strtolower($lang);
    if ($lang == 'ru' || $lang == 'uz' || $lang == 'en') {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('changelang');
```

### Language Switcher UI

✅ **Location:** Navigation bar (visible across all pages)  
✅ **Flags:** Uzbekistan, Russia, UK flags included  
✅ **Labels:** O'zbekcha, Русский, English

---

## 📋 IMPLEMENTATION STEPS

### Step 1: Update Middleware (Optional - Recommended)

Create or update `app/Http/Middleware/SetLocale.php`:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }
        
        return $next($request);
    }
}
```

Register in `app/Http/Kernel.php`:
```php
protected $middlewareGroups = [
    'web' => [
        // ... existing middleware
        \App\Http\Middleware\SetLocale::class,
    ],
];
```

### Step 2: Replace Hardcoded Text in Blade Files

#### Example Conversions:

**❌ OLD (Hardcoded):**
```blade
<h1>Проекты реновации</h1>
<p>Доступные проекты</p>
<button>Скачать</button>
```

**✅ NEW (Localized):**
```blade
<h1>{{ __('frontend.renovation.title') }}</h1>
<p>{{ __('frontend.renovation.available_projects') }}</p>
<button>{{ __('frontend.common.download') }}</button>
```

### Step 3: Priority Files to Update

#### High Priority (User-Facing Pages):

1. **home.blade.php**
   ```blade
   {{-- Hero Section --}}
   <h1 class="hero-title">{{ __('frontend.home.hero_title') }}</h1>
   <p class="hero-description">{{ __('frontend.home.hero_description') }}</p>
   
   {{-- Features --}}
   <h3 class="feature-title">{{ __('frontend.home.feature_1_title') }}</h3>
   <p class="feature-description">{{ __('frontend.home.feature_1_desc') }}</p>
   ```

2. **investoram.blade.php** (Renovation Projects)
   ```blade
   <h1 class="page-title">{{ __('frontend.renovation.title') }}</h1>
   <p class="page-subtitle">{{ __('frontend.renovation.subtitle') }}</p>
   
   <input type="text" placeholder="{{ __('frontend.renovation.search_projects') }}">
   
   <button>{{ __('frontend.common.download') }}</button>
   ```

3. **contact.blade.php**
   ```blade
   <h1 class="page-title">{{ __('frontend.contact.title') }}</h1>
   <p class="page-subtitle">{{ __('frontend.contact.subtitle') }}</p>
   
   <h3 class="contact-title">{{ __('frontend.contact.our_office') }}</h3>
   <p class="contact-tagline">{{ __('frontend.contact.office_tagline') }}</p>
   
   <label>{{ __('frontend.contact.address_title') }}</label>
   <span>{{ __('frontend.contact.address_text') }}</span>
   ```

4. **investor_ideas/create.blade.php**
   ```blade
   <h1>{{ __('frontend.investor_ideas.title') }}</h1>
   <p>{{ __('frontend.investor_ideas.subtitle') }}</p>
   
   <h2>{{ __('frontend.investor_ideas.company_info') }}</h2>
   
   <label>{{ __('frontend.investor_ideas.company_name') }}</label>
   <input type="text" placeholder="{{ __('frontend.investor_ideas.company_name') }}">
   
   <button type="submit">{{ __('frontend.investor_ideas.submit_idea') }}</button>
   ```

5. **media.blade.php** & **media-detail.blade.php**
   ```blade
   <h1>{{ __('frontend.media.title') }}</h1>
   <input type="search" placeholder="{{ __('frontend.media.search_news') }}">
   
   <span>{{ __('frontend.media.published_on') }}: {{ $news->published_at->format('d.m.Y') }}</span>
   ```

#### Medium Priority (Navigation & Layout):

6. **__frontend_nav.blade.php**
   ```blade
   <a href="{{ route('frontend.index') }}">{{ __('frontend.nav.home') }}</a>
   <a href="#">{{ __('frontend.nav.investors') }}</a>
   <a href="{{ route('frontend.investoram') }}">{{ __('frontend.nav.renovation_projects') }}</a>
   <a href="{{ route('frontend.contact') }}">{{ __('frontend.nav.contact') }}</a>
   ```

7. **__frontend_footer.blade.php**
   ```blade
   <h4>{{ __('frontend.footer.about_company') }}</h4>
   <h4>{{ __('frontend.footer.quick_links') }}</h4>
   <p>{{ __('frontend.footer.copyright') }}</p>
   ```

#### Low Priority (Document Pages):

8. Document pages (ustav, kodeks, npa, etc.)
   ```blade
   <h1>{{ __('frontend.documents.charter') }}</h1>
   <button>{{ __('frontend.documents.download_btn') }}</button>
   <th>{{ __('frontend.documents.file_name') }}</th>
   <th>{{ __('frontend.documents.file_size') }}</th>
   ```

---

## 🎯 IMPLEMENTATION WORKFLOW

### Phase 1: Navigation & Common Elements (30 min)
1. Update `__frontend_nav.blade.php`
2. Update `__frontend_footer.blade.php`
3. Update breadcrumbs across all pages
4. Test language switching

### Phase 2: Main Pages (1-2 hours)
1. `home.blade.php` - Hero + features
2. `contact.blade.php` - All labels and text
3. `investoram.blade.php` - Projects page
4. Test each page in all 3 languages

### Phase 3: Forms & Interactive (1 hour)
1. `investor_ideas/create.blade.php` - Form labels
2. `investor_ideas/success.blade.php` - Success messages
3. Search inputs, filters, buttons

### Phase 4: Media & Documents (1 hour)
1. `media.blade.php` - News listing
2. `media-detail.blade.php` - News detail
3. Document pages (ustav, kodeks, npa, etc.)

### Phase 5: Testing & Refinement (30 min)
1. Test all pages in all 3 languages
2. Check for missing translations
3. Verify language switcher works
4. Check RTL/LTR layout (if needed)

---

## 💡 USAGE EXAMPLES

### Basic Translation
```blade
{{ __('frontend.common.search') }}
```
Output: "Поиск" (ru), "Qidirish" (uz), "Search" (en)

### With Parameters
```blade
{{ __('frontend.validation.min_length', ['min' => 100]) }}
```
Output: "Минимальная длина: 100 символов"

### Choice (Pluralization)
```blade
{{ trans_choice('frontend.common.results', $count) }}
```

### In Attributes
```blade
<input type="text" placeholder="{{ __('frontend.renovation.search_projects') }}">
<button title="{{ __('frontend.contact.build_route') }}">...</button>
```

### Conditional Translation
```blade
@if (app()->getLocale() === 'ru')
    {{-- Russian-specific content --}}
@endif
```

### Current Locale
```blade
<html lang="{{ app()->getLocale() }}">
```

---

## 📝 TRANSLATION KEY REFERENCE

### Navigation Keys
```
frontend.nav.home
frontend.nav.about
frontend.nav.investors
frontend.nav.projects
frontend.nav.media
frontend.nav.contact
frontend.nav.investor_proposals
frontend.nav.investment_potential
frontend.nav.renovation_projects
frontend.nav.tenders
```

### Common Keys
```
frontend.common.new
frontend.common.read_more
frontend.common.download
frontend.common.open
frontend.common.close
frontend.common.search
frontend.common.filter
frontend.common.all
frontend.common.submit
frontend.common.cancel
frontend.common.save
frontend.common.edit
frontend.common.delete
frontend.common.back
frontend.common.next
frontend.common.previous
frontend.common.loading
frontend.common.no_results
```

### Page-Specific Keys
See full list in the translation files:
- `frontend.home.*` - Home page
- `frontend.contact.*` - Contact page
- `frontend.renovation.*` - Renovation projects
- `frontend.investor_ideas.*` - Investor proposals
- `frontend.media.*` - News/Media
- `frontend.documents.*` - Documents
- `frontend.footer.*` - Footer
- `frontend.breadcrumb.*` - Breadcrumbs

---

## 🔍 FINDING HARDCODED TEXT

### Quick Search Commands:

**PowerShell:**
```powershell
# Find Russian text in blade files
Get-ChildItem -Path "resources\views\pages\frontend" -Filter "*.blade.php" -Recurse | Select-String -Pattern "[А-Яа-я]+" | Select-Object -First 20

# Find specific words
Select-String -Path "resources\views\pages\frontend\*.blade.php" -Pattern "Проекты|Контакты|Скачать"
```

**Common Hardcoded Patterns:**
- `Проекты реновации` → `{{ __('frontend.renovation.title') }}`
- `Контакты` → `{{ __('frontend.nav.contact') }}`
- `Скачать` → `{{ __('frontend.common.download') }}`
- `Главная` → `{{ __('frontend.nav.home') }}`
- `Поиск` → `{{ __('frontend.common.search') }}`

---

## ✅ TESTING CHECKLIST

### Manual Testing:

1. **Language Switcher:**
   - [ ] Click UZ flag → Content changes to Uzbek
   - [ ] Click RU flag → Content changes to Russian
   - [ ] Click EN flag → Content changes to English
   - [ ] Language persists across page navigation

2. **Navigation:**
   - [ ] All menu items translated
   - [ ] Breadcrumbs translated
   - [ ] Footer links translated

3. **Forms:**
   - [ ] All labels translated
   - [ ] Placeholder text translated
   - [ ] Button text translated
   - [ ] Validation messages translated

4. **Content:**
   - [ ] Page titles translated
   - [ ] Descriptions translated
   - [ ] Status badges translated
   - [ ] Date formats appropriate for locale

5. **Edge Cases:**
   - [ ] No missing translations (no keys showing)
   - [ ] No mixed languages on same page
   - [ ] Text fits in UI elements (no overflow)
   - [ ] Special characters display correctly

---

## 🚀 QUICK START EXAMPLE

### Update One Page (home.blade.php):

**Before:**
```blade
<h1 class="hero-title">ИНВЕСТИРУЙТЕ В БУДУЩЕЕ</h1>
<p class="hero-description">
    Акционерное общество «Компания Ташкент Инвест»...
</p>
```

**After:**
```blade
<h1 class="hero-title">{{ __('frontend.home.hero_title') }}</h1>
<p class="hero-description">
    {{ __('frontend.home.hero_description') }}
</p>
```

**Test:**
1. Visit homepage
2. Click UZ flag → See "KELAJAKKA SARMOYA KIRITING"
3. Click RU flag → See "ИНВЕСТИРУЙТЕ В БУДУЩЕЕ"
4. Click EN flag → See "INVEST IN THE FUTURE"

---

## 📊 STATISTICS

### Translation Coverage:

**Total Translation Keys:** 160+  
**Languages Supported:** 3 (uz, ru, en)  
**Files to Update:** ~38 blade files  
**Estimated Effort:** 4-5 hours for full implementation

### Breakdown by Category:
- Navigation: 10 keys
- Common UI: 18 keys
- Page Content: 90+ keys
- Forms: 25+ keys
- Footer/Breadcrumbs: 15+ keys

---

## 🎓 BEST PRACTICES

### 1. Always Use Translation Keys for:
- ✅ Menu items, buttons, links
- ✅ Form labels and placeholders
- ✅ Status messages, notifications
- ✅ Page titles and headings
- ✅ Error/success messages

### 2. Keep in Original for:
- ✅ User-generated content (news, projects)
- ✅ Names (company names, person names)
- ✅ Numbers, dates (use locale formatting instead)
- ✅ URLs, code references

### 3. Naming Conventions:
- Use dot notation: `frontend.section.key`
- Group related keys: `frontend.contact.*`
- Use descriptive names: `search_projects` not `sp`
- Keep keys lowercase with underscores

### 4. Translation File Organization:
- Group by page/feature
- Add comments for context
- Keep alphabetically sorted within groups
- Document placeholder variables

---

## 🔧 TROUBLESHOOTING

### Translation Not Showing?

1. **Check session:** `session('locale')` should be set
2. **Clear cache:** `php artisan config:clear`
3. **Verify file:** Translation key exists in file
4. **Check syntax:** `__('frontend.key')` not `__('key')`

### Wrong Language Showing?

1. **Clear browser cache**
2. **Check session storage**
3. **Verify middleware order**
4. **Test with incognito window**

### Mixed Languages?

1. **Missed hardcoded text** - search and replace
2. **Fallback locale** - check config/app.php
3. **Missing translation** - add to all 3 files

---

## 📚 ADDITIONAL RESOURCES

### Laravel Localization Docs:
- https://laravel.com/docs/localization
- Translation retrieval: `__()`, `trans()`, `trans_choice()`
- JSON translations for SPA: `resources/lang/{locale}.json`

### Useful Artisan Commands:
```bash
# Clear all caches
php artisan optimize:clear

# View current locale
php artisan tinker
>>> app()->getLocale()

# Set locale in controller
App::setLocale('uz');
```

---

## 🎯 NEXT STEPS

1. ✅ **Translation files created** - DONE
2. ⏳ **Update navigation** - START HERE
3. ⏳ **Update home page** - High priority
4. ⏳ **Update major pages** - investoram, contact
5. ⏳ **Update forms** - investor_ideas
6. ⏳ **Update document pages** - Medium priority
7. ⏳ **Testing** - All 3 languages
8. ⏳ **Refinement** - Fix any issues

---

**Last Updated:** December 12, 2024  
**Status:** Ready for Implementation  
**Estimated Completion:** 4-5 hours for full localization
