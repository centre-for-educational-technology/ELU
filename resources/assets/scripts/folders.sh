#!/bin/bash
/home/vagrant/gdrive --access-token $2 list | grep -E $1" *dir"
