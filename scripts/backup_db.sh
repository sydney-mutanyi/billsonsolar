#!/bin/bash
set -e

# Base directory (parent of billsonsolar directory)
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
APP_DIR="$(cd "${SCRIPT_DIR}/.." && pwd)"
BASE_DIR="$(cd "${APP_DIR}/.." && pwd)"
BACKUP_DIR="${BASE_DIR}/backup"
DATE=$(date +"%Y-%m-%d_%H%M%S")
FILENAME="billsonsolar_db_${DATE}.sql.gz"
BACKUP_PATH="${BACKUP_DIR}/${FILENAME}"

# Ensure backup directory exists
mkdir -p "${BACKUP_DIR}"

# Extract DB credentials from .env
if [ -f "${APP_DIR}/.env" ]; then
    DB_DATABASE=$(grep "^DB_DATABASE=" "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')
    DB_PASSWORD=$(grep "^DB_PASSWORD=" "${APP_DIR}/.env" | cut -d '=' -f2- | tr -d ' "\r')
fi

DB_DATABASE=${DB_DATABASE:-billsonsolar}
DB_PASSWORD=${DB_PASSWORD:-secret}

echo "[$(date '+%Y-%m-%d %H:%M:%S')] Starting database backup for '${DB_DATABASE}'..."

# Run mysqldump from the docker container and compress on the fly
docker exec -i billsonsolar_db mysqldump -u root -p"${DB_PASSWORD}" "${DB_DATABASE}" 2>/dev/null | gzip > "${BACKUP_PATH}"

# Verify file was created and is not empty
if [ -s "${BACKUP_PATH}" ]; then
    FILE_SIZE=$(du -h "${BACKUP_PATH}" | cut -f1)
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] Backup successful: ${FILENAME} (${FILE_SIZE})"
else
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] ERROR: Backup failed or file is empty!"
    rm -f "${BACKUP_PATH}"
    exit 1
fi

# Remove backups older than 7 days
echo "[$(date '+%Y-%m-%d %H:%M:%S')] Cleaning backups older than 7 days..."
find "${BACKUP_DIR}" -type f -name "billsonsolar_db_*.sql.gz" -mtime +7 -delete

echo "[$(date '+%Y-%m-%d %H:%M:%S')] Backup task finished."
