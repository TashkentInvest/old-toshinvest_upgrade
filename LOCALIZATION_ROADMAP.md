# 🌐 Complete Localization Roadmap

## ✅ COMPLETED (88 translations working)

### 1. Navigation Bar - ✅ DONE
- **File:** `resources/views/inc/__frontend_nav.blade.php`
- **Items:** 55 translations
- **Status:** Fully working in UZ/RU/EN

### 2. Homepage - ✅ DONE
- **File:** `resources/views/pages/frontend/home.blade.php`
- **Items:** 6 sections (hero + 5 features)
- **Status:** Fully working in UZ/RU/EN

### 3. Footer - ✅ DONE
- **File:** `resources/views/inc/__frontend_footer.blade.php`
- **Items:** 27 translations
- **Status:** Fully working in UZ/RU/EN

---

## 📋 REMAINING PAGES (40 files)

### Priority 1: High-Traffic Pages (6 files)

#### A. Contact Page
- **File:** `contact.blade.php`
- **Keys needed:** `frontend.contact.*` (16 keys already exist)
- **Hardcoded items:** Address, phone, email labels, map controls

#### B. Renovation Projects
- **File:** `investoram.blade.php`
- **Keys needed:** `frontend.renovation.*` (27 keys already exist)
- **Hardcoded items:** Project titles, filters, status badges

#### C. Investment Projects
- **File:** `investment-projects.blade.php`
- **Keys needed:** `frontend.home.*` + `frontend.common.*`
- **Hardcoded items:** Project descriptions, buttons

#### D. Media/News
- **File:** `media.blade.php`
- **Keys needed:** `frontend.media.*` (9 keys already exist)
- **Hardcoded items:** Search, filters, date labels

#### E. Tender Notice
- **File:** `open_tender_notice.blade.php`
- **Keys needed:** `frontend.tenders.*` (8 keys already exist)
- **Hardcoded items:** Tender details, requirements

#### F. Vacancies
- **File:** `vacancies.blade.php`
- **Keys needed:** `frontend.nav.career` + `frontend.common.*`
- **Hardcoded items:** Job listings, application buttons

---

### Priority 2: Corporate Pages (15 files)

1. `about_us.blade.php` - Company info
2. `board.blade.php` - Management board
3. `supervisory-board.blade.php` - Supervisory board
4. `supervisory-board-committees.blade.php` - Committees
5. `struktura.blade.php` - Structure
6. `kodeks.blade.php` - Code of ethics
7. `ustav.blade.php` - Charter
8. `share-sturukture.blade.php` - Share structure
9. `spisok.blade.php` - Affiliated persons list
10. `charter_capital.blade.php` - Charter capital
11. `dividends.blade.php` - Dividends
12. `business_plan.blade.php` - Business plan
13. `assessment_system.blade.php` - Governance assessment
14. `development_strategies.blade.php` - Development strategies
15. `key_performance_indicators.blade.php` - KPIs

---

### Priority 3: Documents & Reports (10 files)

1. `essential_facts.blade.php` - Essential facts
2. `essential_facts_show.blade.php` - Essential facts detail
3. `internal_documents_of_the_company.blade.php` - Internal docs
4. `nizomlar.blade.php` - Regulations
5. `npa.blade.php` - Legal acts
6. `reports.blade.php` - Reports
7. `balance.blade.php` - Balance sheet
8. `income.blade.php` - Income statement
9. `xaridlar.blade.php` / `zakupki.blade.php` - Procurement
10. `risk_takers.blade.php` - Risk management

---

### Priority 4: Other Pages (9 files)

1. `media-detail.blade.php` - News detail page
2. `offers.blade.php` - Announcements
3. `jac-projects.blade.php` - JAC Motors
4. `investoram_slayd.blade.php` - Presentations
5. `information_on_the_purchase_of_shares_by_the_company.blade.php`
6. `decision-on-the-initial-issue.blade.php`
7. `investoram_which_list_upgraded.php` - (Note: .php file, not .blade.php)

---

## 🚀 IMPLEMENTATION STRATEGY

### Step 1: Identify Common Patterns

Most pages share these common elements:
```blade
<!-- Page Title -->
<h1>Hardcoded Title</h1>
→ <h1>{{ __('frontend.page.title') }}</h1>

<!-- Buttons -->
<button>Скачать</button>
→ <button>{{ __('frontend.common.download') }}</button>

<!-- Labels -->
<label>Название:</label>
→ <label>{{ __('frontend.common.name') }}:</label>

<!-- Status -->
<span>Активный</span>
→ <span>{{ __('frontend.status.active') }}</span>
```

### Step 2: Batch Processing

**Group 1 - Document Pages** (Similar structure):
- All have: title, download buttons, file lists
- Use: `frontend.documents.*` keys
- Estimated: 15 minutes per page

**Group 2 - Corporate Pages** (Similar structure):
- All have: headers, descriptions, team info
- Use: `frontend.nav.*` + `frontend.common.*` keys
- Estimated: 10 minutes per page

**Group 3 - Interactive Pages** (Forms/Lists):
- Have: search, filters, pagination
- Use: `frontend.common.*` keys
- Estimated: 20 minutes per page

---

## 📦 TRANSLATION KEYS STATUS

### Already Created (200+ keys):
✅ `frontend.company.*` - 2 keys
✅ `frontend.nav.*` - 60 keys
✅ `frontend.common.*` - 23 keys
✅ `frontend.home.*` - 11 keys
✅ `frontend.contact.*` - 16 keys
✅ `frontend.renovation.*` - 27 keys
✅ `frontend.investor_ideas.*` - 21 keys
✅ `frontend.media.*` - 9 keys
✅ `frontend.documents.*` - 13 keys
✅ `frontend.footer.*` - 24 keys
✅ `frontend.breadcrumb.*` - 5 keys
✅ `frontend.status.*` - 6 keys
✅ `frontend.tenders.*` - 8 keys

### Need to Add:
❌ `frontend.about.*` - About page content
❌ `frontend.board.*` - Board/management content
❌ `frontend.vacancies.*` - Job listings
❌ `frontend.reports.*` - Financial reports

---

## ⏱️ TIME ESTIMATES

| Priority | Pages | Est. Time | Status |
|----------|-------|-----------|--------|
| **Done** | Navigation + Home + Footer | - | ✅ Complete |
| Priority 1 | 6 high-traffic pages | 2 hours | 🔴 Pending |
| Priority 2 | 15 corporate pages | 3 hours | 🔴 Pending |
| Priority 3 | 10 document pages | 2.5 hours | 🔴 Pending |
| Priority 4 | 9 other pages | 2 hours | 🔴 Pending |
| **TOTAL** | 40 pages | **9.5 hours** | 🔄 In Progress |

---

## 🎯 QUICK WIN APPROACH

### Option A: Semi-Automated (Recommended)
1. Create helper script to detect hardcoded Russian text
2. Generate replacement suggestions
3. Review and apply in batches
4. **Time:** 6-7 hours total

### Option B: Manual Page-by-Page
1. Open each file
2. Find Russian text
3. Replace with translation keys
4. Test each page
5. **Time:** 9-10 hours total

### Option C: AI-Assisted Batch (Fastest)
1. Process similar pages together
2. Use patterns from completed pages
3. Automated search-replace
4. **Time:** 4-5 hours total

---

## 📝 NEXT STEPS

### Immediate Actions:

1. **Start with Priority 1 pages** (highest traffic):
   ```bash
   # Contact page
   # Renovation projects
   # Investment projects
   # Media/news
   # Tender notice
   # Vacancies
   ```

2. **Add missing translation keys**:
   ```php
   // ru/frontend.php, uz/frontend.php, en/frontend.php
   'about' => [
       'title' => '...',
       'description' => '...',
   ],
   'board' => [
       'title' => '...',
       'management_team' => '...',
   ],
   ```

3. **Test each group** before moving to next

---

## ✅ SUCCESS CRITERIA

- [ ] All 40 pages use `{{ __('frontend.key') }}`
- [ ] No hardcoded Russian/Uzbek/English text
- [ ] Language switching works on all pages
- [ ] SEO meta tags also localized
- [ ] Breadcrumbs localized
- [ ] Error messages localized
- [ ] Form validation messages localized

---

## 🔧 HELPER COMMANDS

```bash
# Clear all caches
php artisan optimize:clear

# Test specific page
php artisan tinker
>>> __('frontend.contact.title', [], 'ru')
>>> __('frontend.contact.title', [], 'uz')
>>> __('frontend.contact.title', [], 'en')

# Search for hardcoded Russian text
grep -r "Компания\|Проект\|Скачать" resources/views/pages/frontend/
```

---

**Status:** 88/128 translations complete (69% done)  
**Next:** Implement Priority 1 pages (6 files, 2 hours)
