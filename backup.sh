domain=$1
username=$2

tar -czvf /home/$username/backups/$domain.tar.gz /www/$domain
