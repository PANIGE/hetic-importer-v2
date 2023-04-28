#!/bin/bash

username=$1
new_password=$2

echo "$username:$new_password" | chpasswd -e

echo "Le mot de passe de l'utilisateur $username a été modifié avec succès."
