#!/usr/bin/env bash

if [ -f "yii" ];
then
    read -p "Looks like yii is already installed, this script will overwrite it, are you sure? (y/n): " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Nn]$ ]]
    then
        exit
    fi
fi


if ! command -v docker-compose  &> /dev/null
then
    echo "Error: docker-compose is required for this script"
    exit
fi


if [ ! -f ".env" ];
then
    echo "Please create .env file before installing"
    exit
fi

echo "Installing yii framework.."

docker-compose build
docker-compose pull
docker-compose run --rm php composer install
docker-compose run --rm php php init
