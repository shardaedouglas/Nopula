Write-Host "Fixing SQL compatibility and importing data..." -ForegroundColor Green

# List of SQL files to process
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
        Write-Host "Processing $file..." -ForegroundColor Cyan
        
        # Read the SQL file content
        $content = Get-Content "sql\$file" -Raw
        
        # Fix MySQL 8.0 compatibility issues
        $content = $content -replace "DEFAULT '0000-00-00 00:00:00'", "DEFAULT '1970-01-01 00:00:00'"
        $content = $content -replace "ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci", "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
        $content = $content -replace "DEFAULT CHARSET=latin1", "DEFAULT CHARSET=utf8mb4"
        $content = $content -replace "COLLATE=latin1_swedish_ci", "COLLATE=utf8mb4_unicode_ci"
        
        # Write the fixed content to a temporary file
        $tempFile = "temp_$file"
        $content | Out-File -FilePath $tempFile -Encoding UTF8
        
        # Import the fixed SQL file
        try {
            Get-Content $tempFile | docker exec -i nopula-mysql mysql -u wordpress -pwordpress nopula
            Write-Host "Successfully imported $file" -ForegroundColor Green
        }
        catch {
            Write-Host "Error importing $file" -ForegroundColor Red
        }
        
        # Clean up temporary file
        Remove-Item $tempFile -ErrorAction SilentlyContinue
    }
}

Write-Host ""
Write-Host "Database import completed!" -ForegroundColor Green
