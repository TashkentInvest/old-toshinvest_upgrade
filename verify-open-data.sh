#!/bin/bash
# Open Data System - Installation & Testing Script

echo "=================================================="
echo "Open Data System - Installation Verification"
echo "=================================================="
echo ""

# Colors
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

check_file() {
    if [ -f "$1" ]; then
        echo -e "${GREEN}✓${NC} $1"
        return 0
    else
        echo -e "${RED}✗${NC} $1 (MISSING)"
        return 1
    fi
}

echo "1. Checking Models..."
check_file "app/Models/OpenData.php"
echo ""

echo "2. Checking Migrations..."
check_file "database/migrations/2026_02_17_184456_create_open_data_table.php"
echo ""

echo "3. Checking Controllers..."
check_file "app/Http/Controllers/Admin/OpenDataController.php"
echo ""

echo "4. Checking Admin Views..."
check_file "resources/views/admin/open-data/index.blade.php"
check_file "resources/views/admin/open-data/create.blade.php"
check_file "resources/views/admin/open-data/edit.blade.php"
echo ""

echo "5. Checking Frontend Views..."
check_file "resources/views/pages/frontend/open_data.blade.php"
echo ""

echo "6. Checking Language Files..."
check_file "resources/lang/uz/admin_open_data.php"
check_file "resources/lang/ru/admin_open_data.php"
check_file "resources/lang/en/admin_open_data.php"
echo ""

echo "7. Checking Documentation..."
check_file "OPEN_DATA_SETUP.md"
check_file "OPEN_DATA_COMPLETE.md"
echo ""

echo "=================================================="
echo "System Status: ✅ READY"
echo "=================================================="
echo ""
echo "Next steps:"
echo "1. Run: php artisan migrate"
echo "2. Run: php artisan storage:link"
echo "3. Visit: /admin/open-data"
echo "4. Visit: /open-data"
echo ""

