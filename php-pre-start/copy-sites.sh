#!/bin/bash

if [ -d /opt/app-root/src/html/sites/default ]
then
    echo "Data exists, skip copying default data."
else
    echo "Data dir empty.  Copy default data."
    cp -R /opt/app-root/src/html/defaultsite/* /opt/app-root/src/html/sites
fi
