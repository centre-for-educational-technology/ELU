#!/bin/bash
/home/vagrant/gdrive --access-token $1 upload $2 -p $3 --delete
