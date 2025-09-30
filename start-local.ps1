Write-Host "Starting Nopula WordPress Local Development Environment..." -ForegroundColor Green
Write-Host ""

Write-Host "Building and starting Docker containers..." -ForegroundColor Yellow
docker-compose up -d

Write-Host ""
Write-Host "Waiting for database to be ready..." -ForegroundColor Yellow
Start-Sleep -Seconds 15

Write-Host ""
Write-Host "Importing database files..." -ForegroundColor Yellow

# Import SQL files
$sqlFiles = @(
    "wp_users.sql",
    "wp_usermeta.sql", 
    "wp_posts.sql",
    "wp_postmeta.sql",
    "wp_comments.sql",
    "wp_commentmeta.sql",
    "wp_terms.sql",
    "wp_term_taxonomy.sql",
    "wp_term_relationships.sql",
    "wp_termmeta.sql",
    "wp_options.sql",
    "wp_links.sql",
    "wp_jetpack_sync_queue.sql"
)

foreach ($file in $sqlFiles) {
    if (Test-Path "sql\$file") {
        Write-Host "Importing $file..." -ForegroundColor Cyan
        docker exec nopula-mysql mysql -u wordpress -pwordpress nopula < "sql\$file"
    }
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Green
Write-Host "Local Development Environment Ready!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
Write-Host ""
Write-Host "WordPress Site: http://localhost:8080" -ForegroundColor Cyan
Write-Host "phpMyAdmin:     http://localhost:8081" -ForegroundColor Cyan
Write-Host ""
Write-Host "Database Credentials:" -ForegroundColor Yellow
Write-Host "  Host: localhost:3306"
Write-Host "  Database: nopula"
Write-Host "  Username: wordpress"
Write-Host "  Password: wordpress"
Write-Host ""
Write-Host "To stop the environment, run: docker-compose down" -ForegroundColor Red
Write-Host ""
