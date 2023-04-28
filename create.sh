DOMAIN=www/web/$1
DB_NAME=$2
DB_USER=$3
DB_PASSWORD=$4

CREATE DATABASE IF NOT EXISTS $DB_NAME';
USER $DB_NAME;

CREATE USER $DB_USER'@localhost' IDENTIFIED BY $DB_PASSWORD;
GRANT ALL PRIVILEGES ON $DB_USER.* TO $DB_USER'@localhost';

cat << EOF > /etc/nginx/sites-available/$DOMAIN
server {
	listen 80;
	server_name $DOMAIN;
	root /www/web/$DOMAIN;

	location / {
		try.files \$uri \$uri/ /index.html?\$args;
	}
}
EOF

ln -s /etc/nginx/sites-available/$DOMAIN etc/nginx/sites-enabled/
