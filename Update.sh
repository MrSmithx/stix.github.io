#!/bin/bash

clear
echo "Cleaning Repository..."

echo ""
echo "Removing '.DS_Store' Files..."
find . -name '.DS_Store' -delete

echo "Removing 'Packages' File..."
find . -name 'Packages' -delete

echo "Removing 'Packages.gz' File..."
find . -name 'Packages.gz' -delete

echo "Removing 'Packages.bz2' File..."
find . -name 'Packages.bz2' -delete

echo ""
echo "Scanning For New Packages..."
./dpkg-scanpackages Files /dev/null >Packages

echo ""
echo "Creating New Packages Files..."
gzip -c9 Packages > Packages.gz
bzip2 -c9 Packages > Packages.bz2

echo ""
read -p "Complete, Press Enter To Continue"
clear