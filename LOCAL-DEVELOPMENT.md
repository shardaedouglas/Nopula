# Nopula WordPress Local Development

This setup allows you to run your Nopula WordPress site locally for development and testing.

## Quick Start

### Option 1: PowerShell (Recommended)
```powershell
.\start-local.ps1
```

### Option 2: Batch File
```cmd
start-local.bat
```

### Option 3: Manual Docker Commands
```bash
# Start the environment
docker-compose up -d

# Wait for database to be ready, then import SQL files
# (See start-local.ps1 for the import commands)
```

## Access Points

- **WordPress Site**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081

## Database Credentials

- **Host**: localhost:3306
- **Database**: nopula
- **Username**: wordpress
- **Password**: wordpress

## Development Features

- **Debug Mode**: Enabled (WP_DEBUG = true)
- **Hot Reload**: File changes in wp-content are reflected immediately
- **Database**: MySQL 8.0 with your existing data
- **PHP**: 8.3 (matching your production environment)

## Useful Commands

```bash
# View running containers
docker-compose ps

# View logs
docker-compose logs wordpress
docker-compose logs db

# Stop the environment
docker-compose down

# Stop and remove all data
docker-compose down -v

# Restart WordPress container
docker-compose restart wordpress
```

## File Structure

- `wp-content/` - Your themes, plugins, and uploads (mounted to container)
- `sql/` - Your database export files
- `wp-config.php` - WordPress configuration
- `docker-compose.yml` - Docker services configuration

## Troubleshooting

### Port Already in Use
If port 8080 or 8081 is already in use, edit `docker-compose.yml` and change the port numbers.

### Database Connection Issues
Wait a few more seconds for MySQL to fully start, then try accessing the site again.

### Permission Issues
On Windows, make sure Docker Desktop is running and you have proper permissions.

## Making Changes

1. Edit files in `wp-content/` - changes are reflected immediately
2. Edit `wp-config.php` - restart the WordPress container
3. Database changes - use phpMyAdmin or connect directly to MySQL

## Production Sync

To sync changes back to production:
1. Export your local database changes
2. Upload modified files to your production server
3. Import database changes to production
