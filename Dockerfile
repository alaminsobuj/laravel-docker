FROM php:8.2-fpm-alpine

ARG user
ARG uid

# Update Alpine packages and install necessary dependencies
RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    shadow  # Add shadow package to install useradd

# Install PDO, MySQL extension, Node.js, and npm
RUN docker-php-ext-install pdo pdo_mysql \
    && apk --no-cache add nodejs npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Add a user to the container
RUN useradd -G www-data,root -u $uid -d /home/$user $user

# Set up permissions for the user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set the working directory and switch to the custom user
WORKDIR /var/www
USER $user
