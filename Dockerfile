FROM sail-8.1/app

# Install cron and supervisor
RUN apt-get update && apt-get install -y cron supervisor

# Copy the cron job file and supervisor configuration
COPY ./docker/cron-job /etc/cron.d/batch-cron
COPY ./docker/supervisord.conf /etc/supervisord.conf

# Set permissions for the cron job file
RUN chmod 0644 /etc/cron.d/batch-cron

# Start supervisord in the foreground (this will manage cron)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
