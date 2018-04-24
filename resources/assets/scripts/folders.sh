#!/bin/bash
/home/vagrant/gdrive -c $2 list --absolute | grep -E $1" *dir"
