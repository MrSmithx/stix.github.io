#!/bin/bash

clear
echo "Cleaning Repository..."

echo "-------------------"
echo "Removing '.DS_Store' Files..."
find . -name '.DS_Store' -delete

echo "Removing 'Packages' File..."
find . -name 'Packages' -delete

echo "Removing 'Packages.gz' File..."
find . -name 'Packages.gz' -delete

echo "Removing 'Packages.bz2' File..."
find . -name 'Packages.bz2' -delete

echo "-------------------"
echo "Scanning For New Packages..."
./dpkg-scanpackages -m ./Files /dev/null >Packages

echo "-------------------"
echo "Creating New Packages Files..."
bzip2 -k Packages

echo "-------------------"
read -p "Complete, Press Enter To Continue"
clear