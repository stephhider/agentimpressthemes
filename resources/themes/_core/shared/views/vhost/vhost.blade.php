<IfModule mod_ssl.c>
    <VirtualHost *:443>
        ServerName {{ $subdomain }}.agentimpress.me

        DocumentRoot /var/www/production/app/current/public
        ErrorLog /var/www/dev/AI-Core-Application/error.log
        CustomLog /var/www/dev/AI-Core-Application/access.log combined

        SSLEngine on
        SSLCertificateFile /etc/apache2/ssl/agentimpress.crt
        SSLCertificateChainFile /etc/apache2/ssl/gd_bundle-g2-g1.crt
        SSLCertificateKeyFile /etc/apache2/ssl/agentimpress.key

        SetEnv AGENT_ID {{ $user_id }}

        <Directory /var/ww/production/app/current/public>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
        </Directory>
    </VirtualHost>
</IfModule>

<VirtualHost *:80>
    ServerName {{ $subdomain }}.agentimpress.me
    DocumentRoot /var/www/production/app/current/public
    ErrorLog /var/www/dev/AI-Core-Application/cdnerror.log
    CustomLog /var/www/dev/AI-Core-Application/cdnaccess.log combined

    RewriteEngine on
    RewriteRule ^/(.*) https://%{HTTP_HOST}/$1 [NC,R=301,L]
</VirtualHost>