#!/bin/bash

echo "=========================================="
echo "Database Migration and Seeding Script"
echo "=========================================="
echo ""

# Check if SQL file exists
if [ ! -f "tashken4_old_toshinvest.sql" ]; then
    echo "❌ ERROR: tashken4_old_toshinvest.sql not found in current directory!"
    echo "Please ensure the SQL dump file is in the project root."
    exit 1
fi

echo "✅ SQL dump file found"
echo ""

# Ask user for confirmation
echo "This will:"
echo "  1. Drop all existing database tables"
echo "  2. Run all migrations to create fresh tables"
echo "  3. Import data from tashken4_old_toshinvest.sql"
echo ""
read -p "Continue? (y/n): " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "Operation cancelled."
    exit 0
fi

echo ""
echo "Starting migration..."
echo ""

# Run the migration
sudo docker exec -it laravel_app php artisan migrate:fresh --seed

# Check the exit status
if [ $? -eq 0 ]; then
    echo ""
    echo "=========================================="
    echo "✅ Migration completed successfully!"
    echo "=========================================="
    echo ""
    echo "Verifying data..."
    echo ""
    
    # Verify the import
    sudo docker exec -it laravel_app php artisan tinker --execute="
        echo 'News count: ' . \DB::table('news')->count() . PHP_EOL;
        echo 'Districts count: ' . \DB::table('districts')->count() . PHP_EOL;
        echo 'Projects count: ' . \DB::table('projects')->count() . PHP_EOL;
        echo 'Users count: ' . \DB::table('users')->count() . PHP_EOL;
    "
    
    echo ""
    echo "You can now access the application at: http://localhost:8080"
    echo ""
else
    echo ""
    echo "=========================================="
    echo "❌ Migration failed!"
    echo "=========================================="
    echo ""
    echo "Please check the error messages above."
    echo "You can also check logs with:"
    echo "  sudo docker logs laravel_app"
    echo ""
    exit 1
fi
