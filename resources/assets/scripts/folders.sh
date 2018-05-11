#!/bin/bash
$3 -c $2 list --absolute --max 0 --name-width 0 | grep -F "$1" | grep -E ".*dir"
