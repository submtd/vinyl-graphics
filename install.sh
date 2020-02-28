#!/bin/bash
npm install
if [ $# -eq 0 ] ; then
    npm run dev
elif [ $1 == "production" ] ; then
    npm run production
else
    exit 1
fi
php ../../../artisan vendor:publish --provider="Submtd\\VinylGraphics\\Providers\\VinylGraphicsServiceProvider" --tag=public --force
