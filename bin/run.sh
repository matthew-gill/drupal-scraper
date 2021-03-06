#!/bin/bash
set -e

PROJECT_DIR=$PWD;
source "bin/config.sh";

if ! [ -f "$CID_PATH" ]; then
   echo "No CID file found, container does not seem to be running.";
   exit 1;
fi;

CID=$(cat "$CID_PATH");
echo "Executing command in container $CID..."
docker exec --interactive \
            ${CID} \
            php src/App.php; # Arguments modify the defaults in phpunit.xml
