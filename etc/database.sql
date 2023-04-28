CREATE DATABASE IF NOT EXISTS '%(DOMAIN)';
USE '%(DOMAIN)';

CREATE USER '%(USERNAME)'@'localhost' IDENTIFIED BY '%(PASSWORD)';
GRANT ALL PRIVILEGES ON '%(USERNAME)'.* TO '%(USERNAME)'@'localhost';