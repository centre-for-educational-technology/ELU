#!/bin/bash
$5 -c $2 list --absolute --max 0 | grep -E $1'.*'dir
