# Use the official PHP image
FROM php:7.4-apache

# Install mysqli extension
# RUN docker-php-ext-install mysqli

# Copy the contents of the current directory into the container at /var/www/html
COPY . /var/www/html

# Expose port 9000 to the outside world
EXPOSE 9000

# Start Apache service
CMD ["apache2-foreground"]
