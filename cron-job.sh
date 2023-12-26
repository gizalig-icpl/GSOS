#!/bin/bash

command_file="/var/www/html/cron_jobs.txt"
CRON_USER="root"

ADDITIONAL_CRON_JOB_1="*/2 * * * * sh /var/www/html/cron-job.sh >> /var/log/cron.log 2>&1"
# Check if cron_jobs.txt exists
if [ -f "$command_file" ]; then
  echo "Cron jobs file exists. Modifying crontab: $command_file"
  crontab -u "$CRON_USER" "$command_file"
  (crontab -u "$CRON_USER" -l; echo "$ADDITIONAL_CRON_JOB_1") | crontab -u "$CRON_USER" -
else
  echo "Cron jobs file does not exist: $command_file"
fi
