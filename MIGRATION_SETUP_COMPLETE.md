# Database Migration and Seeding Setup - Complete

## Problem Identified

The error `Table 'laravel.news' doesn't exist` occurred because the migrations were trying to reference tables (like `districts`, `regions`, `streets`, `categories`, `news`) that hadn't been created yet. The SQL dump contains these tables and their data.

## Solution Implemented

I've created all missing migration files and set up a comprehensive data import seeder. Here's what was done:

### 1. Created Missing Migration Files

All migrations have been created with proper timestamps to ensure they run in the correct order:

1. **2024_03_29_214017_create_regions_table.php** - Regions table
2. **2024_03_29_214018_create_districts_table.php** - Districts table (with foreign key to regions)
3. **2024_03_29_214019_create_streets_table.php** - Streets table (with foreign key to districts)
4. **2024_06_20_175028_create_messages_table.php** - Messages table
5. **2024_07_18_270126_create_orders_table.php** - Orders table
6. **2024_08_12_161259_create_histories_table.php** - Histories table
7. **2024_12_08_224656_create_news_table.php** - News table
8. **2024_12_09_183149_create_categories_table.php** - Categories table

The existing migrations remain:
- User tables
- Permission tables
- Products table
- Projects table
- Project stages table
- Project documents table
- Page views table
- Investor ideas table
- Banners table
- News enhancement table

### 2. Created ImportOldDataSeeder

Location: `/home/tic/Desktop/old-toshinvest_upgrade/database/seeders/ImportOldDataSeeder.php`

This seeder:
- Reads the `tashken4_old_toshinvest.sql` file
- Parses and executes SQL statements safely
- Handles errors gracefully
- Imports all data from the old database including:
  - Regions and districts
  - Streets
  - Categories
  - News articles
  - Projects and project data
  - Histories
  - Page views
  - Users and permissions

### 3. Updated DatabaseSeeder

The main `DatabaseSeeder` now calls:
1. `SystemInitSeeder` - For initial system setup
2. `ImportOldDataSeeder` - For importing all data from SQL dump

## How to Run the Migration

### Option 1: Fresh Migration with Seed (Recommended)

This will drop all tables and recreate them with data:

```bash
sudo docker exec -it laravel_app php artisan migrate:fresh --seed
```

### Option 2: Step by Step

If you want to see each step:

```bash
# 1. Drop all tables
sudo docker exec -it laravel_app php artisan migrate:fresh

# 2. Run just the seeder
sudo docker exec -it laravel_app php artisan db:seed
```

### Option 3: Run Only Import Seeder

If tables are already created and you just want to import data:

```bash
sudo docker exec -it laravel_app php artisan db:seed --class=ImportOldDataSeeder
```

## Expected Result

After running the migration successfully, you should have:

1. ✅ All tables created with proper structure
2. ✅ All foreign keys properly set up
3. ✅ Data imported from the SQL file:
   - 1 region (Tashkent)
   - 12 districts
   - Multiple streets
   - Categories
   - News articles (6 articles)
   - Projects (51 projects)
   - User accounts
   - Permissions and roles
   - Historical data
   - Page views

## Verification

After running the migration, verify the setup:

```bash
# Check migration status
sudo docker exec -it laravel_app php artisan migrate:status

# Check if tables exist
sudo docker exec -it laravel_app php artisan tinker
>>> \DB::table('news')->count()
>>> \DB::table('districts')->count()
>>> \DB::table('projects')->count()
>>> exit
```

## Database Structure Overview

### Core Tables
- `users` - System users
- `regions` - Geographic regions (Tashkent)
- `districts` - Districts within regions (12 districts)
- `streets` - Streets within districts
- `categories` - Project categories
- `news` - News articles
- `projects` - Renovation projects
- `project_stages` - Project stages
- `project_documents` - Project documents
- `investor_ideas` - Investor proposals
- `banners` - Website banners
- `page_views` - Page view tracking
- `histories` - Change history tracking

### Supporting Tables
- `permissions` & `roles` - Permission system
- `products` - Product listings
- `orders` - Order management
- `messages` - User messages
- `tokens` - API tokens

## Foreign Key Relationships

All foreign keys are properly set up:
- `districts.region_id` → `regions.id`
- `streets.district_id` → `districts.id`
- `investor_ideas.district_id` → `districts.id`
- `investor_ideas.reviewed_by` → `users.id`
- `messages.user_id` → `users.id`

## Troubleshooting

If you encounter issues:

1. **Foreign Key Errors**: The seeder disables foreign key checks during import
2. **Duplicate Entry Errors**: Run `migrate:fresh` to start clean
3. **SQL File Not Found**: Ensure `tashken4_old_toshinvest.sql` is in the project root
4. **Permission Errors**: Use `sudo` with docker commands

## Next Steps

After successful migration:

1. Verify data integrity
2. Test the application at `http://localhost:8080`
3. Check that news articles display correctly
4. Verify projects are loaded
5. Test user authentication

## Files Modified/Created

### Created Files:
- `database/migrations/2024_03_29_214017_create_regions_table.php`
- `database/migrations/2024_03_29_214018_create_districts_table.php`
- `database/migrations/2024_03_29_214019_create_streets_table.php`
- `database/migrations/2024_06_20_175028_create_messages_table.php`
- `database/migrations/2024_07_18_270126_create_orders_table.php`
- `database/migrations/2024_08_12_161259_create_histories_table.php`
- `database/migrations/2024_12_08_224656_create_news_table.php`
- `database/migrations/2024_12_09_183149_create_categories_table.php`
- `database/seeders/ImportOldDataSeeder.php`

### Modified Files:
- `database/seeders/DatabaseSeeder.php`

All migrations follow Laravel conventions and include proper rollback functionality.
