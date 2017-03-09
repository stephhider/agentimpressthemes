<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/production/app/current/public
    ServerName {{ $domain }}
    ServerAlias www.{{ $domain }}

    SetEnv AGENT_ID {{ $user_id }}

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

<Directory /var/www/production/app/current/public>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    allow from all
</Directory>