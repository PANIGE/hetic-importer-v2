username=$1
password=$2
domain=$3

mkdir /www/$domain
cp -r /www/template/web /www/$domain
cp -r /www/template/etc /www/$domain/etc

echo "s/%(USERNAME)/$username/";
find /www/$domain -type f | xargs sed -i  "s/%(USERNAME)/$username/g"
find /www/$domain -type f | xargs sed -i  "s/%(PASSWORD)/$password/g"
find /www/$domain -type f | xargs sed -i  "s/%(DOMAIN)/$domain/g"

useradd -m $username
mkdir /home/$username/.ssh
mkdir /home/$username/backup

cp /www/$domain/etc/nginx.conf /etc/nginx/sites-enabled/$domain
sudo mysql -u root < /www/$domain/etc/database.sql
sudo service nginx restart
