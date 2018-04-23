#!/bin/bash
/home/vagrant/gdrive -c $2 list | grep -E $1" *dir"
