server {
    listen 80;
    listen [::]:80;

    server_name {{ $domain }} www.{{ $domain }};

    root /home/forge/agentimpress.me/current/public;

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/{{ $domain }}-error.log error;

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;

        fastcgi_param AGENT_ID {{ $user_id }};
        fastcgi_param SESSION_COOKIE_DOMAIN .{{ $domain }};
    }

    location ~ /\.ht {
        deny all;
    }
}