# Tashkent Invest Company - Complete Refactoring Plan

## 🎯 Project Goals
- Professional government/corporate design
- SOLID principles implementation
- Clean, optimized, production-ready code
- 3-language support (RU, UZ, EN)
- Real data only, no fake/demo content
- FontAwesome icons (CDN)
- Unified design system

## 📊 Current Database Analysis
- ✅ Projects (renovation)
- ✅ News
- ✅ Districts/Regions
- ✅ Categories
- ✅ Page Views (tracking)
- ✅ Users/Permissions
- ✅ History/Audit

## 🏗️ New Features Required
1. **Investor Ideas Submission** - Database + Form + Admin Panel
2. **Home Page Banners** - Slider/Carousel system
3. **Latest News Widget** - Homepage integration
4. **Latest Tenders Widget** - Homepage integration
5. **Advertisement Spaces** - Sidebar/aside areas
6. **Enhanced Search** - Global search across all content
7. **Advanced Filters** - For projects, news, tenders
8. **Optimized Pagination** - Consistent across all pages

## 📁 New Architecture Structure

```
app/
├── Contracts/          # Interfaces (DIP)
│   ├── Repositories/
│   └── Services/
├── DTOs/              # Data Transfer Objects
│   ├── News/
│   ├── Project/
│   └── Investor/
├── Repositories/      # Data Access Layer
│   ├── Eloquent/     # Eloquent implementations
│   └── Interfaces/   # Repository contracts
├── Services/         # Business Logic (SRP)
│   ├── NewsService.php
│   ├── ProjectService.php
│   ├── InvestorIdeaService.php
│   └── BannerService.php
├── Http/
│   ├── Requests/     # Form validations
│   ├── Resources/    # API resources
│   └── Controllers/  # Thin controllers
└── View/
    └── Components/   # Blade components
```

## 🎨 Design System

### Color Palette (Government Blue)
```
Primary: #1e40af (Deep Blue)
Secondary: #3b82f6 (Blue)
Accent: #60a5fa (Light Blue)
Dark: #0f172a (Near Black)
Gray: #64748b
Success: #10b981
Warning: #f59e0b
Danger: #ef4444
```

### Typography
```
Font: Inter (Google Fonts CDN)
Headings: 'Roboto Slab' (serif)
```

### Icons
```
FontAwesome 6 (CDN only)
```

## 📋 Implementation Phases

### Phase 1: Core Architecture (DONE)
- [x] Service Layer structure
- [x] Repository Pattern
- [x] DTOs
- [ ] Base Controllers
- [ ] Form Requests

### Phase 2: Database Migrations (NEXT)
- [ ] Investor Ideas table
- [ ] Banners table
- [ ] Enhanced News table
- [ ] Tenders table (separate from projects)
- [ ] Advertisements table

### Phase 3: Models & Repositories
- [ ] InvestorIdea model
- [ ] Banner model
- [ ] Enhanced News model
- [ ] Repositories implementation

### Phase 4: Services Layer
- [ ] InvestorIdeaService
- [ ] BannerService
- [ ] NewsService
- [ ] ProjectService (refactored)
- [ ] TenderService

### Phase 5: Controllers
- [ ] InvestorIdeaController
- [ ] HomeController (refactored)
- [ ] NewsController (refactored)
- [ ] ProjectController (refactored)

### Phase 6: Views & Components
- [ ] Base layout (government style)
- [ ] Home page redesign
- [ ] News listing/detail
- [ ] Projects listing/detail
- [ ] Investor ideas form
- [ ] Admin panels

### Phase 7: Localization
- [ ] Language files (RU, UZ, EN)
- [ ] Language switcher
- [ ] Content translation

### Phase 8: Frontend Assets
- [ ] Remove unused CSS/JS
- [ ] FontAwesome CDN
- [ ] Optimized custom CSS
- [ ] Remove npm dependencies

### Phase 9: Security & Optimization
- [ ] CSRF protection
- [ ] XSS prevention
- [ ] SQL injection protection
- [ ] Rate limiting
- [ ] Caching strategy
- [ ] Asset minification

### Phase 10: Testing & Deployment
- [ ] Code cleanup
- [ ] Remove test routes
- [ ] Production .env example
- [ ] Deployment guide

## 🚀 Quick Start Commands

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Run new migrations
php artisan migrate

# Seed data
php artisan db:seed

# Generate IDE helpers
php artisan ide-helper:generate
php artisan ide-helper:models
```

## 📝 Notes
- All code will follow PSR-12
- All classes will have PHPDoc
- All methods will have type hints
- No code duplication (DRY)
- Single responsibility per class
- Interface-driven development
