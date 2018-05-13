#!/bin/bash
$1 -c $2 list --absolute --max 0 --name-width 0 | grep -F "$3" | grep -E ".*dir"
